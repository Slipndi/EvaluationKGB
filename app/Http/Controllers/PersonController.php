<?php

namespace App\Http\Controllers;

use App\Models\{Country, Person, Role, Speciality};
use Illuminate\Http\{JsonResponse, RedirectResponse, Request};
use Illuminate\Support\Facades\Http;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $people = Person::latest()->paginate(50);
        
        return view('people.index', compact('people'))
                ->with('i', (request()->input('page', 1) - 1) * 50);
    }


    public function create()
    {
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

    Person::create($request->all());
    return redirect()
        ->route('persons.index')
        ->with('success','your person has been create');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePersonRequest  $request
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePersonRequest $request, Person $person)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        //
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

