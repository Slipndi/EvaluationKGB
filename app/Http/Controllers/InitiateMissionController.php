<?php

namespace App\Http\Controllers;

use App\Models\ { Country, Mission, MissionPerson};
use Illuminate\Contracts\View\View;
use Illuminate\Http\ { JsonResponse, Request };
use Illuminate\Support\Collection;

class InitiateMissionController extends Controller
{
    protected const ON_PREPARE_STATUT = 1;
    protected const ON_PROGRESS_STATUT = 2;
    protected int $missionId;
    
    public function index() : View {
        $missions = Mission::select('missions.*', 'specialities.speciality_name')
            ->where('statut_id', static::ON_PREPARE_STATUT)
            ->join('specialities', 'specialities.id', 'missions.speciality_id')    
            ->get();
        return view('administration.initiate.mission')
            ->with(['missions' => $missions]);
    }

    /**
     * Store informations in database
     *
     * @param  Request $request
     * @return void
     */
    public function store(Request $request) {
        $statut = static::ON_PROGRESS_STATUT;
        $formData = collect($request->all());
        $this->missionId = json_decode($formData['mission'])->id;
        $targets = collect($formData['targets']);
        $agents = collect($formData['agents']);
        $contacts =collect($formData['contacts']);

        // Je regroupe tous les intervenants de la mission puis insertion en bdd
        $people = $targets->merge($agents)->merge($contacts);
        $this->insertPersonMission($people);

        // on change le statut de la mission pour la signaler en cours
        $mission = $this->getMission($this->missionId);
        $mission->statut_id = $statut;
        $mission->save();
        
        $message = $mission->title . 'is initialized';

        return redirect()
            ->route('initiate-mission')
            ->with('success',$message);
        
    }

    protected function getMission(int $missionId) : Mission {
        return Mission::where('id', $missionId)->first();
    }

    protected function insertPersonMission(Collection $people) : void {
        $people->each(
            fn($person)=>MissionPerson::create([
                'person_id' => $person,
                'mission_id' => $this->missionId
            ])
        );
    }
}
