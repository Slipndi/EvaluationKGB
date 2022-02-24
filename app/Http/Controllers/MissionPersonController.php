<?php

namespace App\Http\Controllers;

use App\Models\MissionPerson;
use App\Http\Requests\StoreMissionPersonRequest;
use App\Http\Requests\UpdateMissionPersonRequest;

class MissionPersonController extends Controller
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
     * @param  \App\Http\Requests\StoreMissionPersonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMissionPersonRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MissionPerson  $missionPerson
     * @return \Illuminate\Http\Response
     */
    public function show(MissionPerson $missionPerson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MissionPerson  $missionPerson
     * @return \Illuminate\Http\Response
     */
    public function edit(MissionPerson $missionPerson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMissionPersonRequest  $request
     * @param  \App\Models\MissionPerson  $missionPerson
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMissionPersonRequest $request, MissionPerson $missionPerson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MissionPerson  $missionPerson
     * @return \Illuminate\Http\Response
     */
    public function destroy(MissionPerson $missionPerson)
    {
        //
    }
}
