<?php

namespace App\Http\Controllers\Rate;

use App\Http\Controllers\Controller;
use App\Models\City;

class CreateController extends Controller
{
    public function __invoke(City $city)
    {
        return view('rate.create', compact('city'));

    }
}
