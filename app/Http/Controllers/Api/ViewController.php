<?php

namespace App\Http\Controllers\Api;

use App\Models\View;
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
		$data = $request->validated();
		
		$clientIp = request()->ip();

		if(!(View::where('IP', $clientIp)->count())){
			$data['clientIp'] = $clientIp;
	
			$newView = new View();
			$newView->fill($data);
	
			$newView->save();
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
