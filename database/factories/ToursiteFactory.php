<?php

namespace Database\Factories;

use App\Models\Toursite;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ToursiteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Toursite::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'other_name' => $this->faker->text(5),
            'description' => $this->faker->sentence(2),
            'accomodation' => $this->faker->sentence(3),
            'region' => $this->faker->name(),
            'district' => $this->faker->text(5),
            'distance' => $this->faker->randomFloat(2, 0, 9999),
            'attractions' => $this->faker->sentence(3),
            'local_price' => $this->faker->randomNumber(2),
            'international_price' => $this->faker->randomNumber(2),
            'time_of_visit' => $this->faker->sentence(2),
            'country_id' => 2,
        ];
    }
}
