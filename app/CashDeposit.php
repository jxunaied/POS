<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CashDeposit extends Model
{
    protected $fillable = [
        'deposit_date', 'from', 'to', 'amount'
    ];
}
