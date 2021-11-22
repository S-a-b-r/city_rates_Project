<?php

namespace App\Http\Controllers\Rate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Rate\StoreRequest;
use App\Models\City;
use App\Models\Rate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(City $city, StoreRequest $req)
    {
        $data = $req->validated();
        try{
            DB::beginTransaction();
            $data['id_city'] = $city->id;
            $data['id_author'] = auth()->user()->id;
            $data['img'] = Storage::disk('public')->put('/images',$data['img']);
            Rate::firstOrCreate($data);
            DB::commit();
        } catch(\Exception $exception){
            DB::rollBack();
            return abort(500);
        }


        return redirect()->route('index');
    }
}
