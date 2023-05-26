<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attractionimages;

class AttractionimagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Attractionimages::factory()
            ->count(1)
            ->create();
    }
}
