<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\Seat;

class Bus extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'registration_number', 'type', 'driver_name', 'driver_contact',
        'route_from', 'route_to', 'departure_time'
    ];

    public function seats()
    {
        return $this->hasMany(Seat::class);
    }
}
