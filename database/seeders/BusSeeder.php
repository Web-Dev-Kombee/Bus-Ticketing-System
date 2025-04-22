<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bus;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   // database/seeders/BusSeeder.php

   public function run(): void
   {
       Bus::factory()->count(10)->create();
   }

}
