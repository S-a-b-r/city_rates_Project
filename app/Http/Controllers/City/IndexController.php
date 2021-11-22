<?php

namespace App\Http\Controllers\City;

use App\Models\City;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke()
    {
        $cities = DB::table('rates')
            ->leftJoin('cities', 'cities.id', '=', 'rates.id_city')
            ->select('cities.id', 'cities.name', DB::raw('round(AVG(rates.rate),1) as rate'))
            ->groupBy('cities.id', 'cities.name')
            ->orderBy('cities.name')
            ->get();
        return view('city.index', compact('cities'));
    }
}
