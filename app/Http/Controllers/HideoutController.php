<?php

namespace App\Http\Controllers;

use App\Models\{ Hideout, Country };
use Illuminate\Http\{ JsonResponse, RedirectResponse, Request};
use Illuminate\View\View;

class HideoutController extends Controller
{
    /**
     * Display list of hideouts
     *
     * @return RedirectResponse
     */
    public function index() : View {
        $hideouts = Hideout::latest()->paginate(50);
        return view('hideout.index', compact('hideouts'))
                ->with('i', (request()->input('page', 1) - 1) * 50);
    }
    /**
     * Display create form with countries
     *
     * @return View
     */
    public function create() : View {
        $countries = Country::all();
        return view('hideout.create', compact('countries'));
    }

    /**
     * Store information after verification
     *
     * @param  Request          $request
     * @return RedirectResponse
     */
    public function store(Request $request) : RedirectResponse {
        $request->validate([
            'code_name'=>'required',
            'country_id'=>'required',
            'address'=>'required',
            'type'=>'required'
        ]);
        Hideout::create($request->all());
        return redirect()
            ->route('hideouts.index')
            ->with('success', $request->code_name . 'creation successfull');
    }

    public function show(Hideout $hideout) {
        //
    }

    /**
     * Display Edit form with values
     *
     * @param  Hideout $hideout
     * @return View
     */
    public function edit(Hideout $hideout) : View {
        $countries = Country::all();
        return view('hideout.edit', compact('countries', 'hideout'));
    }

    /**
     * Update hideout data from form
     *
     * @param  Request $request
     * @param  Hideout $hideout
     * @return void
     */
    public function update(Request $request, Hideout $hideout) : RedirectResponse {
        $request->validate([
            'code_name'=>'required',
            'country_id'=>'required',
            'address'=>'required',
            'type'=>'required'
        ]);
        $hideout->update($request->all());
        return redirect()
            ->route('hideouts.index')
            ->with('success', $request->code_name. ' is update');
    }

    /**
     * Delete hideout 
     *
     * @param  Hideout $hideout
     * @return RedirectResonse
     */
    public function destroy(Hideout $hideout) : RedirectResponse {
        $hideout->delete();
        return redirect()
            ->route('hideouts.index')
            ->with('success', $hideout->code_name . ' is delete');
    }

    /**
     * Get JSON data for Misson initiation
     *
     * @param  Request      $request
     * @param  integer      $countryId
     * @return JsonResponse
     */
    public function getJson(Request $request, int $countryId) : JsonResponse {
        return Response()
            ->json(
                Hideout::where('country_id', $countryId)
                ->get()
            );
    }
}
