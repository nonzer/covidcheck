<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    public function citie(){
        return $this->belongsTo('App\Citie', 'cities_id');
    }
}
