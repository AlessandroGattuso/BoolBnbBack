<?php

use App\Http\Controllers\Admin\ProfileController as ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ApartmentController as ApartmentController;
use App\Http\Controllers\Admin\SponsorshipController as SponsorshipController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
	return view('auth.login');
});
Route::get('/checkout', 'App\Http\Controllers\StripeController@checkout')->name('checkout');
Route::post('/session', 'App\Http\Controllers\StripeController@session')->name('session');
Route::get('/success', 'App\Http\Controllers\StripeController@success')->name('success');

Route::middleware(['auth', 'verified'])->name('admin.')->prefix('admin')->group(function () {
	Route::get('/', [ApartmentController::class, 'index'])->name('dashboard');
	Route::resource('/apartments', ApartmentController::class)->parameters(['apartments' => 'apartment:slug']);
	Route::resource('/sponsorships', SponsorshipController::class)->parameters(['apartments' => 'apartment:slug']);
});

Route::middleware('auth')->group(function () {
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
