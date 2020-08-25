<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    protected $fillable = [
        'parentid', 'name',
    ];

/*    function parent_name(){
        return $this->belongsTo('App\ExpenseCategory', 'parent_id', 'id');
    }*/
}
