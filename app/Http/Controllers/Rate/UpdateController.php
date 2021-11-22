<?php

namespace App\Http\Controllers\Rate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Rate\UpdateRequest;
use App\Models\Rate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(Rate $rate, UpdateRequest $req)
    {
        $data = $req->validated();
        try{
            DB::beginTransaction();
            if(isset($data['img'])){
                $data['img'] = Storage::disk('public')->put('/images',$data['img']);
            }
            $rate->update($data);
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            return abort(500);
        }

        return redirect()->route('index');
    }
}
