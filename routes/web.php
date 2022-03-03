<?php

use App\Http\Controllers\{
    CountryController,
    HideoutController,
    initiateMissionController, 
    MissionController,
    PersonController
};
use App\Models\Hideout;
use App\Models\Person;
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
Route::get('/', [MissionController::class, 'list'])->name('home');

//Accès Administrateur
Route::get('/initiate-mission',[InitiateMissionController::class, 'index'])->name('initiate-mission');
Route::post('/submitMission', [initiateMissionController::class, 'store']);
//Route::get('/submitMission', [initiateMissionController::class, 'store']);

// CRUD
Route::resource('missions', MissionController::class);
Route::resource('persons', PersonController::class);
Route::resource('hideouts', Hideout::class);

//Routes pour requête AJAX avec response en Json
Route::get('/country/json/{countryId}',[CountryController::class, 'getJson']);
Route::get('/people/json/{roleId}/{countryId}/{specialityId?}',[PersonController::class, 'getJson']);
Route::get('/hideout/json/{countryId}',[HideoutController::class, 'getJson']);

