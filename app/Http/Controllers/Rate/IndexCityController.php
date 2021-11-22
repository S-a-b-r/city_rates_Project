<?php

namespace App\Http\Controllers\Rate;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Rate;

class IndexCityController extends Controller
{
    public function __invoke(City $city)
    {
        session()->put('city', $city->id);
        $rates = Rate::where('id_city', $city->id)->get();
        return view('rate.rates_city', compact('rates', 'city'));
    }
}
