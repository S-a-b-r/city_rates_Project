<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function creator()
    {
        return $this->belongsTo(User::class,'id_author','id');
    }
    public function city()
    {
        return $this->belongsTo(City::class,'id_city','id');
    }
}
