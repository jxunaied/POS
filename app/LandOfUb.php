<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LandOfUb extends Model
{
    protected $fillable = [
        'kata', 'decimal', 'land_owners_id', 'remarks'
    ];

    function ownerName() {
        return $this->belongsTo('App\LandOwner','land_owners_id','id');
    }
}
