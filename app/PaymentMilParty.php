<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMilParty extends Model
{
    protected $fillable = [
        'mil_party_id', 'payment_date', 'amount', 'remarks'
    ];

    function milpartyName() {
        return $this->belongsTo('App\MilParty','mil_party_id','id');
    }
}
