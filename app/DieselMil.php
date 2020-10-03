<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DieselMil extends Model
{
    public function setTable($table)
    {
        $this->table = 'diesel_mils';
        return $this;
    }

    protected $fillable = [
        'name'
    ];
}
