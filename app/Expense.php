<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'name', 'category_id', 'amount','remarks',
    ];

    function categoryName() {
        return $this->belongsTo('App\ExpenseCategory','category_id','id');
    }
}
