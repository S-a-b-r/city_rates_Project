<?php

namespace App\Http\Controllers\Rate;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use App\Models\User;

class IndexUserController extends Controller
{
    public function __invoke(User $user)
    {
        $rates = Rate::where('id_author',$user->id)->get();
        return view('rate.rates_user', compact('rates','user'));
    }
}
