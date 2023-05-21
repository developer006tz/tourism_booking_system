<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Transportation;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransportationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transportation::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => 'flight',
            'price' => $this->faker->randomFloat(2, 0, 9999),
            'distance_covered_in_km' => $this->faker->randomNumber(1),
            'toursite_id' => \App\Models\Toursite::factory(),
        ];
    }
}
