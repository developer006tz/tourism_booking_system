<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Attractionimages;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttractionimagesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attractionimages::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => $this->faker->sentence(15),
            'attractions_id' => \App\Models\Attractions::factory(),
        ];
    }
}
