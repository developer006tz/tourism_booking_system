<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Tourchallenges;
use Illuminate\Database\Eloquent\Factories\Factory;

class TourchallengesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tourchallenges::class;

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
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
