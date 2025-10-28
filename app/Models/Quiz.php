<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class quiz extends Model
{
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function Mcq(){
        return $this->hasMany(Mcq::class);
    }

    public function Records(){
        return $this->hasMany(Record::class);
    }
}
