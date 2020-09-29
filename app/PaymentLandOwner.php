<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentLandOwner extends Model
{
    function ownerName() {
        return $this->belongsTo('App\LandOwner','land_owners_id','id');
    }
}
