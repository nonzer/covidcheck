<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{

    public $timestamps= false;
    public function cities(){
           return $this->hasMany('App\Citie','regions_id'); 
    }
}
