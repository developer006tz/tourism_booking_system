<?php

namespace Database\Factories;

use App\Models\Attractions;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttractionsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attractions::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(5),
            'distance' => $this->faker->randomFloat(2, 0, 9999),
            'toursite_id' => \App\Models\Toursite::factory(),
        ];
    }
}
