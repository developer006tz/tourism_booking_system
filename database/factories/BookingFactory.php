<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'toursite_id' => \App\Models\Toursite::factory(),
            'transportation_id' => \App\Models\Transportation::factory(),
            'accomodations_id' => \App\Models\Accomodations::factory(),
        ];
    }
}
