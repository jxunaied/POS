<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    //

    public function employee_name(){
        return $this->belongsTo('App\Employee','employee_id','id');
    }
}
