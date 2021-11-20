<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $req){
        $cities = City::all();
        $city = geoip()->getLocation($req->ip)['city'];
        return view('index', compact('cities','city'));
    }
}
