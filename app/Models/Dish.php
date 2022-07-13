<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    public function kind(){
        return $this->belongsTo(\App\Models\Kind::class, 'kind_id','id');
    }

}
