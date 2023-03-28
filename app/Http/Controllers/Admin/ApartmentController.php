<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Http;
use App\Http\Requests\StoreApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Sponsorship;
use App\Models\Service;
use App\Models\Position;
use App\Models\View;

use Illuminate\Support\Facades\Auth;

class ApartmentController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$userId = Auth::id();
		$userName = Auth::user()->nome;
		$apartments = Apartment::all()->where('user_id', $userId);
	
		return view('admin.dashboard', compact('apartments','userName'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$services = Service::all(); 
		$sponsorships = Sponsorship::all();
		
		return view('admin.Apartments.create', compact('services','sponsorships'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\StoreApartmentRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreApartmentRequest $request)
	{
		$data = $request->validated();
		//dd($request->all());

		$data['slug'] = Apartment::generateSlug($request->descrizione);

		// if($request->hasFile('cover')){
		// 		$path = Storage::disk('public')->put('Apartment_images', $request->cover);
		// 		$data['cover'] = $path;
		// }

		$data['user_id'] =  Auth::id();
		
		$apartment = Apartment::create($data);
		$newPosition = new Position();
		$newPosition->indirizzo = $request->indirizzo;
		$newPosition->N_civico = $request->N_civico;
		$newPosition->città = $request->città;
		$newPosition->Nazione = $request->Nazione;
		
		$newPosition->Latitudite = $request->Latitudine;
		$newPosition->Longitudine = $request->Longitudine;

		$response = Http::get('https://api.tomtom.com/search/2/geocode/'.$newPosition->indirizzo.', '.$newPosition->città.', '.$newPosition->Nazione.'.json?key='.env('TOMTOM_KEY'));
        $jsonData = $response->json();

		dd($jsonData);
        $newPosition->position()->save($newPosition);

		if($request->has('services'))
				$apartment->services()->attach($request->services);
		
		$apartment_views = [];
		return view('admin.apartments.show', compact('apartment', 'apartment_views'))->with('message', 'Hai aggiunto un nuovo appartamento con successo');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Apartment  $apartment
	 * @return \Illuminate\Http\Response
	 */
	public function show(Apartment $apartment)
	{
		//Controllo sulle view in un determinato periodo
		$apartment_views = [];
		$views = View::all();

		foreach($views as $view){
			if($apartment->id == $view->apartment_id){
				$apartment_views[] = $view;
			}
		}

		return view('admin.apartments.show', compact('apartment', 'apartment_views'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Apartment  $apartment
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Apartment $apartment)
	{
		$services = Service::all(); 
		return view('admin.apartments.edit', compact('apartment', 'services'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\UpdateApartmentRequest  $request
	 * @param  \App\Models\Apartment  $apartment
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateApartmentRequest $request, Apartment $apartment)
	{
		$data = $request->validated();

		$data['slug'] = apartment::generateSlug($request->descrizione);

		// if($request->hasFile('cover_image')){

		// 		if($apartment->cover_image)
		// 				Storage::delete($apartment->cover_image);  
				

		// 		$path = Storage::disk('public')->put('apartment_images', $request->cover); 
		// 		$data['cover'] = $path;

		// }

		$apartment->update($data);
		
		if($request->has('services'))
				$apartment->services()->sync($request->services);
		else
				$apartment->services()->detach();


		return redirect()->route('admin.apartments.index')->with('message', "Le modifiche all'appartamento sono state salvate correttamente");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Apartment  $apartment
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Apartment $apartment)
	{
		$apartment->delete();
    return redirect()->route('admin.apartments.index')->with('message',"L'appartmanento è rimosso correttamente");
	}
}
