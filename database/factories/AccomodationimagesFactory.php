<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Accomodationimages;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccomodationimagesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Accomodationimages::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => 'surroundings',
            'description' => $this->faker->sentence(15),
            'accomodations_id' => \App\Models\Accomodations::factory(),
        ];
    }
}
