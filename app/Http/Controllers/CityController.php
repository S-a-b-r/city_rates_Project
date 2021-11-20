<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    public function index()
    {
        $cities = DB::table('rates')
            ->leftJoin('cities', 'cities.id', '=', 'rates.id_city')
            ->select('cities.id', 'cities.name', DB::raw('round(AVG(rates.rate),1) as rate'))
            ->groupBy('cities.id', 'cities.name')
            ->orderBy('cities.name')
            ->get();
        return view('city.index', compact('cities'));
    }

    public function show(City $city)
    {
        $rates = Rate::where('id_city', $city->id)->get();
        return view('city.show', compact('rates','city'));
    }
}
