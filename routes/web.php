<?php

use App\Http\Controllers\{CountryController, initiateMission, MissionController};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Accès utilisateurs standard
Route::get('/', fn() => view('index'));

//Accès Administrateur
Route::get('/initiate-mission',fn() => (new InitiateMission)->index());
//Crud Mission 
Route::resource('missions', MissionController::class);

//Routes pour requête AJAX avec response en Json
Route::get('/country/json/{countryId}',[CountryController::class, 'getJson']);