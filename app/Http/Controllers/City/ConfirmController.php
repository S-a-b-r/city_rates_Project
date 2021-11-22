<?php

namespace App\Http\Controllers\City;

use App\Models\City;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ConfirmController extends Controller
{
    public function __invoke($city)
    {
        $city = City::firstOrCreate(['name' => $city]);
        session()->put('city', $city->id);
        return redirect()->route('rates.city.show', $city);
    }
}
