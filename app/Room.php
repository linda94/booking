<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Booking;

/**
* Class for the room model. Used to create dynamic room objects which can be assigned variables.
*
*/
class Room extends Model
{
     protected $table = 'room';

     public function bookings()
    {
        return $this->has_many('booking');
    }

    // this is a recommended way to declare event handlers
    protected static function boot() {
        parent::boot();

        static::deleting(function($room) { // before delete() method call this
             $room->bookings()->delete();
             // do the rest of the cleanup...
        });
    }
}
