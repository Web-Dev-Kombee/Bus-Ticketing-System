<?php

// database/factories/BusFactory.php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BusFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->company . ' Travels',
            'registration_number' => strtoupper('MH-' . rand(10, 99) . '-' . rand(1000, 9999)),
            'type' => $this->faker->randomElement(['AC', 'Non-AC', 'Sleeper', 'Volvo']),
            'driver_name' => $this->faker->name,
            'driver_contact' => $this->faker->phoneNumber,
            'route_from' => $this->faker->city,
            'route_to' => $this->faker->city,
            'departure_time' => $this->faker->time('H:i:s'),
        ];
    }
}
