<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\{ RedirectResponse, Request};
use Illuminate\View\View;

class SpecialityController extends Controller
{

    public function index() {
        $specialities = Speciality::latest()->paginate(50);
        return view('specialities.index', compact('specialities'))
                ->with('i', (request()->input('page', 1) - 1) * 50);
    }

    public function create() : View {
        return view('specialities.create');
    }

    public function store(Request $request) : RedirectResponse {
        $request->validate([
            'speciality_name' => 'required|unique:Specialities,speciality_name'
        ]);
        Speciality::create($request->all());
        return redirect()
            ->route('specialities.index')
            ->with('success', $request->speciality_name. ' successfully create.');
    }

    public function show(Speciality $speciality) {
        //
    }

    public function edit(Speciality $speciality) {
        return view('specialities.edit', compact('speciality')); 
    }

    public function update(Request $request, Speciality $speciality) : RedirectResponse {
        $request->validate([
            'speciality_name' => 'required|unique:Specialities,speciality_name'
        ]);
        $speciality->update($request->all());
        return redirect()
            ->route('specialities.index')
            ->with('success', $request->speciality_name. ' successfully update.');
    }

    public function destroy(Speciality $speciality)
    {
        $speciality->delete();
        return redirect()
            ->route('specialities.index')
            ->with('success', $speciality->speciality_name. ' successfully delete.');
    }
}
