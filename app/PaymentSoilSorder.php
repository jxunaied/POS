<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentSoilSorder extends Model
{

    function sorderName() {
        return $this->belongsTo('App\SoilSordar','soil_sorder_id','id');
    }
}
