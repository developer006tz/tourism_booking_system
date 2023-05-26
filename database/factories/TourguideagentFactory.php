<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Tourguideagent;
use Illuminate\Database\Eloquent\Factories\Factory;

class TourguideagentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tourguideagent::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(2),
            'description' => $this->faker->sentence(2),
            'guide_price_per_day' => $this->faker->randomNumber(2),
            'rating' => $this->faker->randomNumber(1),
            'distance_covered' => $this->faker->randomNumber(2),
            'toursite_id' => \App\Models\Toursite::factory(),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
