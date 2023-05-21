<?php

namespace Database\Seeders;

use App\Models\Toursiteimages;
use Illuminate\Database\Seeder;

class ToursiteimagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Toursiteimages::factory()
            ->count(5)
            ->create();
    }
}
