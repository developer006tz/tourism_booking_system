<?php

namespace Database\Seeders;

use App\Models\Toursite;
use Illuminate\Database\Seeder;

class ToursiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Toursite::factory()
            ->count(5)
            ->create();
    }
}
