<?php

namespace App\Http\Controllers;

use App\Http\Requests\Rate\StoreRequest;
use App\Http\Requests\Rate\UpdateRequest;
use App\Models\City;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RateController extends Controller
{
    public function show(City $city, Rate $rate)
    {
        return view('rate.show', compact('rate'));
    }

    public function create(City $city)
    {
        return view('rate.create', compact('city'));
    }

    public function store(City $city, StoreRequest $req)
    {
        $data = $req->validated();
        $data['id_city'] = $city->id;
        $data['id_author'] = auth()->user()->id;
        $data['img'] = Storage::disk('public')->put('/images',$data['img']);
        Rate::firstOrCreate($data);
        return redirect()->route('city.show',$city);
    }

    public function edit(Rate $rate)
    {
        if($rate->id_author == auth()->user()->id) {
            return view('rate.edit', compact('rate'));
        }
        return abort(404);
    }

    public function update(Rate $rate, UpdateRequest $req)
    {
        $data = $req->validated();
        if(isset($data['img'])){
            $data['img'] = Storage::disk('public')->put('/images',$data['img']);
        }
        $rate->update($data);
        return redirect()->route('city.show', $rate->id_city);
    }

    public function destroy(Rate $rate)
    {
        $rate->delete();
        if(session()->has('city')){
            return redirect()->route('city.show', session()->get('city'));
        }
        return redirect()->route('index');
    }
}
