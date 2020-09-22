<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'category_id', 'quantity_available', 'unit_name'
    ];

    function categoryName() {
        return $this->belongsTo('App\ProductCategory','category_id','id');
    }
}
