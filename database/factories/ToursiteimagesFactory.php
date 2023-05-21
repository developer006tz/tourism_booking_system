<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Toursiteimages;
use Illuminate\Database\Eloquent\Factories\Factory;

class ToursiteimagesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Toursiteimages::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'url' => $this->faker->url(),
            'description' => $this->faker->sentence(5),
            'toursite_id' => \App\Models\Toursite::factory(),
        ];
    }
}
