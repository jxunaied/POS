<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name', 'phone', 'address', 'experience', 'nid', 'email', 'city', 'salary', 'joining','leave'
    ];
}
