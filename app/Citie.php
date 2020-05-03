<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Citie extends Model
{
    public function region(){
        return $this->belongsTo('App\Region','regions_id'); 
    }

    public function stats(){
        return $this->hasMany('App\Stat','cities_id'); 
    }
}
