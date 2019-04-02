<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed worker
 * @method static find(int $int)
 */
class Worker extends Model
{




    public function boss()
    {
        return $this->belongsTo(Worker::class, 'parent_id', 'id');
    }

    public function workerBoss()
    {
        return $this->hasMany(Worker::class, 'parent_id', 'id');
    }
}

