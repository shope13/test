<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    public function boss()
    {
        return $this->hasMany('Worker:class', 'id_boss');
    }

    public function worker()
    {
        return $this->belongsTo('Worker:class', 'id', 'id_boss');
    }
}

