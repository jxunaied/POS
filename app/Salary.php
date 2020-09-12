<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = [
        'employee_id', 'salary_month', 'salary_year', 'paid_amount'
    ];

    public function employee_name(){
        return $this->belongsTo('App\Employee','employee_id','id');
    }
}
