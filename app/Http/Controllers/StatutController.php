<?php

namespace App\Http\Controllers;

use App\Models\Statut;
use App\Http\Requests\StoreStatutRequest;
use App\Http\Requests\UpdateStatutRequest;

class StatutController extends Controller
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
     * @param  \App\Http\Requests\StoreStatutRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStatutRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Statut  $statut
     * @return \Illuminate\Http\Response
     */
    public function show(Statut $statut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Statut  $statut
     * @return \Illuminate\Http\Response
     */
    public function edit(Statut $statut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStatutRequest  $request
     * @param  \App\Models\Statut  $statut
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStatutRequest $request, Statut $statut)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Statut  $statut
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statut $statut)
    {
        //
    }
}
