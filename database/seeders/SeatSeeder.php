<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seat;
use App\Models\Bus;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $rows = 5;
        $cols = ['A', 'B', 'C', 'D'];

        // Loop through all buses
        foreach (Bus::all() as $bus) {
            foreach (range(1, $rows) as $row) {
                foreach ($cols as $index => $col) {
                    Seat::create([
                        'bus_id' => $bus->id,
                        'seat_number' => $row . $col,
                        'status' => 'available',
                        'travel_date' => now()->toDateString(),
                        'seat_type' => ($col == 'A' || $col == 'D') ? 'Window' : 'Aisle',
                        'row' => $row,
                        'column' => $index + 1,
                        'layout_position' => $row . $col,
                    ]);
                }
            }
        }
    }
}
