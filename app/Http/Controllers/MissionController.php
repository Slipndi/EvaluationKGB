<?php

namespace App\Http\Controllers;

use App\Models\{ Country, Mission, Speciality, Statut };
use Illuminate\Contracts\View\View;
use Illuminate\Http\{ RedirectResponse, Request };
use Illuminate\Support\Facades\Http;

class MissionController extends Controller
{
    protected const ON_DUTY_STATUT_ID = 2;
    /**
    * Permet d'afficher la liste des missions en cours
    *
    * @return View
    */
    public function index() : View {
        $missions = Mission::latest()
            ->paginate(50);

        return view('missions.index', compact('missions'))
            ->with('i', (request()->input('page', 1) - 1) * 50);
    }
    
    public function list() : View {
        $missions = Mission::latest()
            ->where('statut_id', static::ON_DUTY_STATUT_ID)
            ->paginate(6);
        return view('missions.list', compact('missions'))
            ->with('i', (request()->input('page', 1) - 1) * 6);
    }

    /**
     * Création d'une nouvelle mission
     *
     */
    public function create() : View {
        return view('missions.create');
    }
    
    /**
     *  Vérification et insertion en base de donnée
     */
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Mission::create($request->all());
        return redirect()
            ->route('missions.index')
            ->with('success','La mission a bien été crée');
    }

    /**
     * Affiche la mission sélectionnée en détail
     *
     */
    public function show(Mission $mission) : View {
        return view('missions.show', compact('mission'));
    }

    /**
     * Affichage du formulaire pour l'édition
     */
    public function edit(Mission $mission) : View {
        $countries = Country::all();
        $statuts = Statut::all();
        $specialities = Speciality::all();
        return view(
            'missions.edit', 
            compact(
                'mission', 
                'countries',
                'statuts',
                'specialities'
            )
        );
    }

    /**
     * Insertion en base de donnée
     */
    public function update(Request $request, Mission $mission) : RedirectResponse {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $mission->update($request->all());
        return redirect()
            ->route('missions.index')
            ->with('success','La mission a bien été mise à jour');
    }

    /**
     * Suppression de l'enregistrement dans la base de donnée
     */
    public function destroy(Mission $mission) : RedirectResponse {
        $mission->delete();
        return redirect()->route('missions.index')
            ->with('success','La mission a bien été supprimée');
    }

}
