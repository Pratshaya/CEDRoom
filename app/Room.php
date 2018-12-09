<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Room extends Model
{

    protected $fillable = [
        'name',
    ];

    public function status()
    {
        return $this->hasMany('Status');
    }
}
