<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\{JsonResponse, Request, Response};

class CountryController extends Controller
{
    public function getJson (Request $request, int $countryId) : JsonResponse {
        $country = Country::find($countryId);
        return Response()->json($country);
    }
}
