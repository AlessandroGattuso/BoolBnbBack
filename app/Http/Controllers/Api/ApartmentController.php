<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Apartment;

class ApartmentController extends Controller
{
    public function index(){
        $apartments = Apartment::with('services', 'sponsorships', 'position')->where('visible', 1)->paginate();
        return response()->json([
            'success' => true,
            'apartments' => $apartments
        ]);
    }

    public function distance($lat1, $lon1, $lat2, $lon2) {
        $R = 6371; // km
        $dLat = $this->toRad($lat2 - $lat1);
        $dLon = $this->toRad($lon2 - $lon1);
        $lat1 = $this->toRad($lat1);
        $lat2 = $this->toRad($lat2);

        $a = sin($dLat / 2) * sin($dLat / 2) +
        sin($dLon / 2) * sin($dLon / 2) * cos($lat1) * cos($lat2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $d = $R * $c;
        return $d;
    }

    // Converts numeric degrees to radians
    public function toRad($Value) {
        return $Value * M_PI / 180;
    }

    public function getFilteredApartments(Request $request){
    
        $apartmentsRes = Apartment::with('sponsorships', 'position')
                                    ->where('numero_di_letti', '>=',$request['minBeds'])
                                    ->where('numero_di_bagni', '>=',$request['minBaths'])
                                    ->where('visible', 1)
                                    ->paginate();
        $apartments = [];
        foreach($apartmentsRes as $apartment){
            if($this->distance($request['latitude'], $request['longitude'], $apartment->position->Latitudine,  $apartment->position->Longitudine) <= $request['range'])
                array_push($apartments, $apartment);
        }
        $result = [];
        if($request['services'] != null){
        
            foreach($apartments as $apartment){
                $flag2 = false;
                $flag3 = true;
                foreach($request['services'] as $service){
                    $flag1 = false;
                    foreach($apartment['services'] as $apartService){
                        if($apartService->nome == $service)
                            $flag1 = true;
                    }
                    if(!$flag1)
                        $flag3 = false;
                    if($flag1 && $flag3)
                        $flag2 = true;
                }
                if($flag2 && $flag3)
                    array_push($result,$apartment);
            };
            return response()->json([
                'success' => true,
                'apartments' => $result
            ]);
        }
        else{
            //dump('fine');
            return response()->json([
                'success' => true,
                'apartments' => $apartments
            ]);
        }
    }

    public function show($slug){
        $apartment = Apartment::with('services', 'sponsorships', 'position')->where('slug', $slug)->first();

        if($apartment){
            return response()->json([
                'success'=> true,
                'apartment'=> $apartment
            ]);
        }
        else{
            return response()->json([
                'success'=> false,
                'error'=> 'nessun errore trovato'
            ]);
        }
    }

}
