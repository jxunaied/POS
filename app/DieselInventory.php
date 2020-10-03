<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DieselInventory extends Model
{
    public function setTable($table)
    {
        $this->table = 'diesel_inventories';
        return $this;
    }

    protected $fillable = [
        'added_date', 'diesel_amount', 'remarks'
    ];
}
