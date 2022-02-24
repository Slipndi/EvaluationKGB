<?php

namespace App\Http\Controllers;

use App\Models\Hideout;
use App\Http\Requests\StoreHideoutRequest;
use App\Http\Requests\UpdateHideoutRequest;

class HideoutController extends Controller
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
     * @param  \App\Http\Requests\StoreHideoutRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHideoutRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hideout  $hideout
     * @return \Illuminate\Http\Response
     */
    public function show(Hideout $hideout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hideout  $hideout
     * @return \Illuminate\Http\Response
     */
    public function edit(Hideout $hideout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHideoutRequest  $request
     * @param  \App\Models\Hideout  $hideout
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHideoutRequest $request, Hideout $hideout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hideout  $hideout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hideout $hideout)
    {
        //
    }
}
