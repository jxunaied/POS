<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MilParty extends Model
{
    protected $fillable = [
        'name', 'balance', 'due',
    ];
}
