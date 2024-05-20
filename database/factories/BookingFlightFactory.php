<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookingFlight>
 */
class BookingFlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\BookingFlight::class;


    public function definition(): array
    {
        return [
            'booking_id' => $this->faker->unique()->randomNumber(5),
            'lead_passenger_name' => $this->faker->name(),
            'agent_name' => $this->faker->company(),
            'price' => $this->faker->randomFloat(2, 100, 1000),
            'booking_date' => $this->faker->date(),
            'departure_date' => $this->faker->date(),
            'arrival_date' => $this->faker->date(),
            'departure_time' => $this->faker->time(),
            'arrival_time' => $this->faker->time(),
            'flight_number' => $this->faker->bothify('??#???'),
            'status'=>'Confirmed',
            'airline' => $this->faker->company(),
        ];
    }
}
