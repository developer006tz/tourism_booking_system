<?php

namespace Database\Seeders;

use App\Models\Tourchallenges;
use Illuminate\Database\Seeder;

class TourchallengesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tourchallenges::factory()
            ->count(5)
            ->create();
    }
}
