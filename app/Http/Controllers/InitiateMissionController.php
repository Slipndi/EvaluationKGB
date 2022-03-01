<?php

namespace App\Http\Controllers;

use App\Models\ { Country, Mission };
use Illuminate\Contracts\View\View;
use Illuminate\Http\ { JsonResponse, Request };

class InitiateMissionController extends Controller
{
    protected const ON_PREPARE_STATUT = 1;

    
    public function index() : View {
        $missions = Mission::where('statut_id', static::ON_PREPARE_STATUT)
        ->join('specialities', 'specialities.id', 'missions.speciality_id')    
        ->get();
        return view('administration.initiate.mission')
            ->with(['missions' => $missions]);
    }

    public function submit(Request $request) : void {
        dd($request);
    }

}
