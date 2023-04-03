<?php

namespace App\Http\Controllers\Api;

use App\Models\View;
use App\Models\Apartment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class ViewController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
	  
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		var_dump($request->all());
		$data = $request->validate([
			'IP' => 'required|ip',
			'apartment_id' => ['exists:apartments,id','required'],
		]);

		if(!(View::where('IP', $data['IP'])->Where('apartment_id', $data['apartment_id'])->count())){
	
			$newView = new View();
			$newView->fill($data);
	
			$newView->save();

			return response()->json([
				'success'=> true,
	
			]);
		}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\View  $View
	 * @return \Illuminate\Http\Response
	 */
	public function show(View $View)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\View  $View
	 * @return \Illuminate\Http\Response
	 */
	public function edit(View $View)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\View  $View
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, View $View)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\View  $View
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(View $View)
	{
		//
	}
}
