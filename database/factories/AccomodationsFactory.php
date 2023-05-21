<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Accomodations;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccomodationsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Accomodations::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'type' => 'hotel',
            'sleep_service' => 'yes',
            'description' => $this->faker->sentence(15),
            'local_night_fee' => $this->faker->randomNumber(2),
            'international_night_fee' => $this->faker->randomNumber(2),
            'food_service' => 'yes',
            'food_types_and_price' => $this->faker->text(),
            'is_inside_park' => 'yes',
            'distance_to_tour_site' => $this->faker->randomNumber(1),
            'room_available' => $this->faker->randomNumber(0),
            'toursite_id' => \App\Models\Toursite::factory(),
        ];
    }
}
