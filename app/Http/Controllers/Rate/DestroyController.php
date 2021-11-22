<?php

namespace App\Http\Controllers\Rate;

use App\Http\Controllers\Controller;
use App\Models\Rate;

class DestroyController extends Controller
{
    public function __invoke(Rate $rate)
    {
        $rate->delete();
        return redirect()->route('index');
    }
}
