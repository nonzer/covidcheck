<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $guarded = [];
    protected $table= 'stats';

    public $timestamps = true;

    public function city(){
        return $this->belongsTo('App\City', 'cities_id');
    }
}
