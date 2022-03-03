<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use Illuminate\Http\{JsonResponse, Request};

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePersonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePersonRequest $request)
    {
        //
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

