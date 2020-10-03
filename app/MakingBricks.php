<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MakingBricks extends Model
{
    protected $fillable = [
        'mil_party_id', 'date', 'brick_amount', 'payable'
    ];

    function milpartyName() {
        return $this->belongsTo('App\MilParty','mil_party_id','id');
    }
}
