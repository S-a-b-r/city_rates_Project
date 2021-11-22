<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $req){
        if(session()->has('city')){
            return redirect()->route('rates.city.show', session()->get('city'));
        }
        $city = geoip()->getLocation($req->ip)['city'];
        return view('index', compact('city'));
    }


}
