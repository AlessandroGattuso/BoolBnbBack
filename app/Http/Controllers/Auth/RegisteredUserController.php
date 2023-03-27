<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
	/**
	 * Display the registration view.
	 */
	public function create(): View
	{
		return view('auth.register');
	}

	/**
	 * Handle an incoming registration request.
	 *
	 * @throws \Illuminate\Validation\ValidationException
	 */
	public function store(UserRequest $request): RedirectResponse
	{
		dd('ciao');
		//$request->validated();
		// $request->validate([
		// 	'nome' => ['string', 'max:255'],
		// 	'cognome' => ['string', 'max:255'],
		// 	'data_di_nascita' => ['date'],
		// 	'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
		// 	'password' => ['required', 'confirmed', Rules\Password::defaults()],
		// ]);
		$user = User::create([
			'nome' => $request->nome,
			'cognome' => $request->cognome,
			'data_di_nascita' => $request->data_di_nascita,
			'email' => $request->email,
			'password' => Hash::make($request->password),
		]);

		event(new Registered($user));

		Auth::login($user);

		return redirect(RouteServiceProvider::HOME);
	}
}
