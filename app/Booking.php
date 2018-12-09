<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'detail',
        'date',
        'start_time',
        'e_time',
        'room_id',
        'users_id',
    ];
    public function room()
    {
        return $this->belongsTo('Room', 'booking_id');
    }
    public function user()
    {
        return $this->belongsTo('User', 'booking_id');
    }
}
