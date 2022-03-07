<?php

namespace App\Http\Controllers;

use App\Models\ {Mission, MissionHideout, MissionPerson};
use Illuminate\Contracts\View\View;
use Illuminate\Http\ { JsonResponse, Request };
use Illuminate\Support\Collection;

class InitiateMissionController extends Controller
{
    protected const ON_PREPARE_STATUT = 1;
    protected const ON_PROGRESS_STATUT = 2;
    protected int $missionId;
    
    /**
     * Display information into view
     *
     * @return View
     */
    public function index() : View {
        $missions = Mission::select('missions.*', 'specialities.speciality_name')
            ->where('statut_id', static::ON_PREPARE_STATUT)
            ->join('specialities', 'specialities.id', 'missions.speciality_id')
            ->get()
            ->sortByDesc('id');
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

        if ($formData->has('hideouts')){
            $hideouts = collect($formData['hideouts']);
            $this->insertHideoutMission($hideouts);
        } 

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

    /**
     * Get mission with his ID
     *
     * @param  integer $missionId
     * @return Mission
     */
    protected function getMission(int $missionId) : Mission {
        return Mission::where('id', $missionId)->first();
    }

    /**
     * Insert people in database
     *
     * @param  Collection $people
     * @return void
     */
    protected function insertPersonMission(Collection $people) : void {
        $people->each(
            fn($person)=> MissionPerson::create([
                'person_id' => $person,
                'mission_id' => $this->missionId
            ])
        );
    }

    /**
     * Insert informations into database
     *
     * @param  Collection $hideouts
     * @return void
     */ 
    protected function insertHideoutMission(Collection $hideouts) : void {
        $hideouts->each(
            fn($hideout) => MissionHideout::create([
                'hideout_id' => $hideout,
                'mission_id' => $this->missionId
            ])
        );
    }
}
