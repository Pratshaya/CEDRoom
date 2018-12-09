<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function room()
    {
        return $this->belongsTo('Room', 'status_id');
    }
}
