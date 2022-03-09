<?php

use App\Http\Controllers\{
    AdminController,
    CountryController,
    HideoutController,
    InitiateMissionController, 
    MissionController,
    PersonController,
    SpecialityController,
};

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
Route::get('/mission/{mission}', [MissionController::class, 'show'])->name('mission.show');

// Authentification
Route::get('/login', fn()=>view('auth.login'))->name('login');
Route::post('/login', [AdminController::class, 'checkAuth'])->name('checkAuth');


// Routes reservés aux utilisateurs ayant un compte
Route::group(['middleware' => 'auth'], function () {
    //Accès Administrateur
    Route::get('/initiate-mission',[InitiateMissionController::class, 'index'])->name('initiate-mission');
    Route::post('/submitMission', [InitiateMissionController::class, 'store']);
    
    // CRUD
    Route::resource('missions', MissionController::class, ['except' => ['show']]);
    Route::resource('people', PersonController::class);
    Route::resource('hideouts', HideoutController::class);
    Route::resource('specialities', SpecialityController::class);

    //Routes pour requête AJAX avec response en Json
    Route::get('/country/json/{countryId}',[CountryController::class, 'getJson']);
    Route::get('/people/json/{roleId}/{countryId}/{specialityId?}',[PersonController::class, 'getJson']);
    Route::get('/hideout/json/{countryId}',[HideoutController::class, 'getJson']);

    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
    
    Route::fallback(fn()=>redirect()->route('home'));
});
