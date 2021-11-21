<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Rate;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user){
        return view('user.show', compact('user'));
    }
    public function showRates(User $user){
        $rates = Rate::where('id_author',$user->id)->get();
        return view('user.rates', compact('rates','user'));
    }



}
