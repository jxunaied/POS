<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class saleAtaGlance extends Model
{
    protected $fillable = [
        'date', 'qty_bricks', 'opening_balance', 'cash_sale', 'dues',
        'acc_receivable', 'advance', 'gross_sales', 'expense', 'net_sales',
        'deposits', 'closing_balance'
    ];
}
