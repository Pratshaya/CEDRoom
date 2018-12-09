<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function room()
    {
        return $this->belongsTo('Room', 'booking_id');
    }
    public function user()
    {
        return $this->belongsTo('User', 'booking_id');
    }
}
