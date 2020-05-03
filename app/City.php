<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = [];
    
    public $timestamps = false;

    public function region(){
        return $this->belongsTo(Region::class, 'regions_id');
    }

    public function statistics(){
        return $this->hasMany(Statistic::class);
    }
}
