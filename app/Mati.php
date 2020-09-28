<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mati extends Model
{
    protected $fillable = [
        'soil_sorder_id', 'measurement', 'total_cft','rate','amount', 'remarks',
    ];

    function sorderName() {
        return $this->belongsTo('App\SoilSordar','soil_sorder_id','id');
    }
}
