<?php

namespace App\Http\Controllers\Rate;

use App\Http\Controllers\Controller;
use App\Models\Rate;

class EditController extends Controller
{
    public function __invoke(Rate $rate)
    {
        if($rate->id_author == auth()->user()->id) {
            return view('rate.edit', compact('rate'));
        }
        return abort(404);
    }
}
