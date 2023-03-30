<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Apartment;

class ApartmentController extends Controller
{
    public function index(Request $request){
        $apartments = Apartment::with('services', 'sponsorships', 'position')->paginate();
        return response()->json([
            'success' => true,
            'apartments' => $apartments
        ]);
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