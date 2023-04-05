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

    public function getFilteredApartments(Request $request){
        $apartments = Apartment::with('services', 'sponsorships', 'position')
                                ->where('numero_di_letti', '>=',$request['minBeds'])
                                ->where('numero_di_bagni', '>=',$request['minBaths'])
                                ->where('visible', 1)
                                ->paginate();
        
        $result = [];
        if($request['services'] != null){
            foreach($request['services'] as $service){
               foreach($apartments as $apartment){
                    foreach($apartment['services'] as $apartService){
                        if($apartService->nome == $service){
                            array_push($result,$apartment);
                            break;
                        }
                    }
               }
            };
            return response()->json([
                'success' => true,
                'apartments' => $result
            ]);
        }
        else{
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
