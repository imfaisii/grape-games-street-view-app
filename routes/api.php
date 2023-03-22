<?php

use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Auth\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::get('/user', fn (Request $request) => $request->user());

    Route::post('/logout', [AuthController::class, 'destroy'])
        ->name('logout');
});

Route::post('/login', [AuthController::class, 'store'])
    ->name('login');

Route::get('locations', [LocationController::class, 'getAllLocations']);
Route::get('locations/{name}', [LocationController::class, 'getAllLocationsByCategoryName']);
