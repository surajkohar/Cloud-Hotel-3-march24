<?php

namespace Database\Seeders;

use App\Models\BookingFlight;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingFlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        BookingFlight::factory()->count(5)->create();
    }
}
