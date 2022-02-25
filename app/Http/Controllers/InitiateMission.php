<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class InitiateMission extends Controller
{
    protected const ON_PREPARE_STATUT = 1;

    
    public function index() : View {
        $missions = Mission::where('statut_id', static::ON_PREPARE_STATUT)->get();
        return view('administration.initiate.mission')
            ->with(['missions' => $missions]);
    }
}
