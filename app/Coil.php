<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coil extends Model
{
    protected $fillable = [
        'truck_no', 'chalan_no', 'rate', 'quantity', 'amount', 'truck_fair', 'total_amount', 'supplier_id',
        'place_name', 'purchase_date', 'remarks',
    ];

    function supplierName() {
        return $this->belongsTo('App\Supplier','supplier_id','id');
    }
}
