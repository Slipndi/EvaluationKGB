<?php

namespace App\Http\Controllers;

use App\Models\{Country, Person, PersonSpeciality, Role, Speciality};
use Illuminate\Http\{JsonResponse, RedirectResponse, Request};
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class PersonController extends Controller
{
    protected const AGENT_ID = 1;
    /**
     * List of people
     *
     * @return View
     */
    public function index() : View {
        $people = Person::latest()->paginate(50);
        return view('people.index', compact('people'))
                ->with('i', (request()->input('page', 1) - 1) * 50);
    }

    /**
     * Create people with specialities and country
     *
     * @return View
     */
    public function create() : View {
        $countries = Country::all();
        $specialities = Speciality::all();
        $roles = Role::all();
        $response = Http::get('https://randomuser.me/api/')->collect('results');
        $picture = $response[0]['picture']['medium'];
        return view('people.create', compact(
            'picture', 
            'countries', 
            'specialities',
            'roles'
        ));
    }

    /**
     * Stocker les résultats dans la base de donnée
     *
     * @param  Request          $request
     * @return RedirectResponse
     */
    public function store(Request $request) : RedirectResponse {        
        $request->validate([
            'code_name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'country_id' => 'required',
            'role_id' => 'required',
            'picture' => 'required',
            'birthdate' => 'required',
        ]);
        // Création du personnage
        $person = Person::create($request->all());
        // Si agent on rajoute les spécialités
        if($request->role_id == static::AGENT_ID){
            $request->validate([
                'speciality_id' => 'required'
            ]);
            $specialities = collect($request->speciality_id);
            $specialities->each(fn(int $speciality_id) => PersonSpeciality::create([
                'speciality_id'=>$speciality_id,
                'person_id'=>$person->id
            ]));
        }
    
    return redirect()
        ->route('people.index')
        ->with('success','your person has been create');
}

    public function show(Person $person) : View {
        return View('people.view', compact('person'));
    }

    /**
     * Display page for edition of person
     *
     * @param  Person $person
     * @return View
     */
    public function edit(Person $person) : View {
        $countries = Country::all();
        $specialities = Speciality::all();
        $roles = Role::all();
        $personSpeciality = PersonSpeciality::where('person_id', $person->id)
            ->get('speciality_id')
            ->toArray();
        $personSpeciality = Arr::flatten($personSpeciality);
        
        return view(
            'people.edit', 
            compact(
                'person', 
                'countries',
                'specialities',
                'roles',
                'personSpeciality'
            )
        );
    }

    public function update(Request $request, Person $person) : RedirectResponse {
        
        $request->validate([
            'code_name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'country_id' => 'required',
            'role_id' => 'required',
            'picture' => 'required',
            'birthdate' => 'required',
        ]);
        // Création du personnage
        $person->update($request->all());

        // Si agent on rajoute les spécialités
        if($request->role_id == static::AGENT_ID){
            $request->validate([
                'speciality_id' => 'required'
            ]);
            //on vide les enregistrements existants
            PersonSpeciality::where('person_id', $person->id)
                ->delete('speciality_id');
            
            //on insère les nouveaux choix
            collect($request->speciality_id)->each(
                function(int $id) use ($person) : void {
                    PersonSpeciality::create([
                        'speciality_id' => $id,
                        'person_id' => $person->id
                    ]);
                }
            );
        }
        return redirect()
            ->route('people.index')
            ->with('success', $person->code_name.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        $codeName = $person->code_name;
        $person->delete();

        return redirect()
            ->route('people.index')
            ->with('success', $codeName.' delete');
    }
    /**
     * Get data when an Ajax request is made
     *
     * @param  Request      $request
     * @param  integer      $roleId
     * @param  integer      $countryId
     * @param  integer|null $specialityId
     * @return JsonResponse
     */
    public function getJson(
        Request $request, 
        int $roleId, 
        int $countryId, 
        int $specialityId = null
    ) : JsonResponse {
        if($roleId == 1 ) {
            return Response()
            ->json(
                Person::select('persons.*')
                ->join('person_speciality', 'person_speciality.person_id','persons.id')
                ->join('specialities', 'specialities.id', 'person_speciality.speciality_id')
                ->where('country_id', '!=', $countryId)
                ->where('role_id', $roleId)
                ->where('specialities.id', $specialityId)
                ->limit(5)
                ->get()
            );
            }
        return Response()
            ->json(
                Person::where('country_id', $countryId)
                ->where('role_id', $roleId)
                ->get()
            );
    }
}

