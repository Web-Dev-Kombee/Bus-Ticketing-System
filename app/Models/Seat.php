<?php

namespace App\Models;
use App\Models\Bus;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
     protected $fillable = [
        'bus_id', 'seat_number', 'status', 'travel_date', 'seat_type',
        'row', 'column', 'layout_position'
    ];

    // 🔧 This is the missing relationship
    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
}
