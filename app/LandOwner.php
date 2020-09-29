<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LandOwner extends Model
{
    protected $fillable = [
        'name', 'balance', 'due',
    ];
}
