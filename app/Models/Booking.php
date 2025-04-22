<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Seat;

class Booking extends Model
{
    protected $fillable = [
        'seat_id',
        'name',
        'email',
        'phone',
        'route',
        'departure_time',
        'seat_number',
        'ticket_number',
        'qr_code_path',
        'status',
    ];

    /**
     * Each booking belongs to a seat.
     */
    public function seat()
    {
        return $this->belongsTo(Seat::class);
    }
}
