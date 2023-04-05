<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sponsorship;
use App\Models\Apartment;

use Illuminate\Support\Facades\Auth;

class SponsorshipController extends Controller
{
    
    public function index($slug)
    {
        $apartment = Apartment::where('slug', $slug)->first();
        $sponsorships = Sponsorship::all();
        
		return view('admin.apartments.sponsorship', compact('sponsorships', 'apartment'));

    }
}
