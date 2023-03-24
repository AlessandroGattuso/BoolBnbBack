<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MessageController as MessageController;
use App\Http\Controllers\Api\ViewController as ViewController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/messages/{apartment}', [MessageController::class, 'index']);
Route::put('/messages/{apartment}', [MessageController::class, 'store']);
Route::delete('/messages/{apartment}', [MessageController::class, 'delete']);

Route::get('/views/{apartment}', [ViewController::class, 'index']);
Route::put('/views/{apartment}', [ViewController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
