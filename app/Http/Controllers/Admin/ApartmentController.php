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
use Illuminate\Support\Facades\Storage;

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
		$data['slug'] = Apartment::generateSlug($request->descrizione);

		$data['user_id'] =  Auth::id();
		
		$newPosition = new Position();

		if($request->hasFile('cover')){
			$path = Storage::disk('public')->put('apartment_images', $request->cover);
			
			$data['cover'] = $path;
		}


		$request->validate([
			'indirizzo' => ['required','string', 'max:255'],
			'N_civico' => ['required','numeric', 'max:255'],
			'città' => ['required','string', 'max:50'],
			'Nazione' => ['required', 'string', 'max:20'],
		]);
		
		$newPosition->indirizzo = $request->indirizzo;
		$newPosition->N_civico = $request->N_civico;
		$newPosition->città = $request->città;
		$newPosition->Nazione = $request->Nazione;

		$response = Http::get('https://api.tomtom.com/search/2/geocode/'.$newPosition->indirizzo.', '.$newPosition->città.', '.$newPosition->Nazione.'.json?key='.env('TOMTOM_KEY'));
		$jsonPosition = $response->json()['results'][0];

		if($jsonPosition['position']['lat'] && $jsonPosition['position']['lon']){
			$newPosition->Latitudine = $jsonPosition['position']['lat'];
			$newPosition->Longitudine = $jsonPosition['position']['lon'];
		}
		else{
			return back()->with('error', 'Position not found');
		}
		
		$apartment = Apartment::create($data);
		
		$newPosition->apartment_id = $apartment->id;

		$apartment->position()->save($newPosition);
		
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
		$userId = Auth::id();
		if($userId == $apartment->user_id){

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
		else{
			return redirect()->route('admin.dashboard')->with('warning', 'Non puoi visualizzare gli appartamenti di un altro utente');
		}

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Apartment  $apartment
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Apartment $apartment)
	{
		$userId = Auth::id();
		if($userId == $apartment->user_id){

			$services = Service::all(); 
			return view('admin.apartments.edit', compact('apartment', 'services'));
		}
		else{
			return redirect()->route('admin.dashboard')->with('warning', 'Non puoi modificare gli appartamenti di un altro utente');
		}
		
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

		$userId = Auth::id();
		if($userId != $apartment->user_id){
			return redirect()->route('admin.dashboard')->with('warning', 'Non puoi modificare gli appartamenti di un altro utente');
		}

		$data = $request->validated();
		//$position = Position::all()->where('apartment_id', $apartment->id);
	
		// $request->validate([
		// 	'indirizzo' => ['required','string', 'max:255'],
		// 	'N_civico' => ['required','numeric', 'max:255'],
		// 	'città' => ['required','string', 'max:50'],
		// 	'Nazione' => ['required', 'string', 'max:20'],
		// ]);

		$response = Http::get('https://api.tomtom.com/search/2/geocode/'.$request->indirizzo.', '.$request->città.', '.$request->Nazione.'.json?key='.env('TOMTOM_KEY'));
		$jsonPosition = $response->json()['results'][0];

		if(!($jsonPosition['position']['lat'] && $jsonPosition['position']['lon'])){
			return back()->with('error', 'Position not found');
		}
		
		$data['slug'] = apartment::generateSlug($request->descrizione);
		
		if($request->hasFile('cover')){
			
					if($apartment->cover)
							Storage::delete($apartment->cover);  
			
			
					$path = Storage::disk('public')->put('apartment_images', $request->cover); 
					$data['cover'] = $path;
			
			}
		
	
			$apartment->update($data);

			$apartment->position->indirizzo = $request['indirizzo'];
			$apartment->position->N_civico = $request['N_civico'];
			$apartment->position->città = $request['città'];
			$apartment->position->Nazione = $request['Nazione'];
			$apartment->position->Longitudine = $jsonPosition['position']['lon'];
			$apartment->position->Latitudine = $jsonPosition['position']['lat'];

			$apartment->push();

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
		$userId = Auth::id();
		if($userId != $apartment->user_id){
			return redirect()->route('admin.dashboard')->with('warning', 'Non puoi modificare gli appartamenti di un altro utente');
		}

		$apartment->delete();
    	return redirect()->route('admin.apartments.index')->with('message',"L'appartmanento è rimosso correttamente");
	}
}
