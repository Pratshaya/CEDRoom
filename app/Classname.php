<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classname extends Model
{
    public function user()
    {
        return $this->belongsTo('User', 'classname_id');
    }
}
