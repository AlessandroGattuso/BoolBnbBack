<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\View;
use App\Models\Apartment;

use Illuminate\Support\Facades\Auth;

class ViewsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index($slug)
	{
		// dd($slug);
		$views = View::all();
		$apartments = Apartment::all();

		return view('admin.apartments.views', compact('views', 'apartments', 'slug'));
	}
}
