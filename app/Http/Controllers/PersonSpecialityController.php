<?php

namespace App\Http\Controllers;

use App\Models\PersonSpeciality;
use App\Http\Requests\StorePersonSpecialityRequest;
use App\Http\Requests\UpdatePersonSpecialityRequest;

class PersonSpecialityController extends Controller
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
     * @param  \App\Http\Requests\StorePersonSpecialityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePersonSpecialityRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PersonSpeciality  $personSpeciality
     * @return \Illuminate\Http\Response
     */
    public function show(PersonSpeciality $personSpeciality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PersonSpeciality  $personSpeciality
     * @return \Illuminate\Http\Response
     */
    public function edit(PersonSpeciality $personSpeciality)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePersonSpecialityRequest  $request
     * @param  \App\Models\PersonSpeciality  $personSpeciality
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePersonSpecialityRequest $request, PersonSpeciality $personSpeciality)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PersonSpeciality  $personSpeciality
     * @return \Illuminate\Http\Response
     */
    public function destroy(PersonSpeciality $personSpeciality)
    {
        //
    }
}
