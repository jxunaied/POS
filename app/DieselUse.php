<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DieselUse extends Model
{
    protected $fillable = [
        'date', 'amount', 'party_id',
    ];

    function milName() {
        return $this->belongsTo('App\DieselMil','party_id','id');
    }
}
