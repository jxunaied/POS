<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerDue extends Model
{
    protected $fillable = [
        'invoice_no', 'original_amount', 'cus_id', 'paid_date', 'paid_amount', 'current_due', 'remarks'
    ];

    function invoiceNo() {
        return $this->belongsTo('App\Sale','invoice_no','id');
    }

    function customerName() {
        return $this->belongsTo('App\Customer','cus_id','id');
    }
}
