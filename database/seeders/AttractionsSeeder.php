<?php

namespace Database\Seeders;

use App\Models\Attractions;
use Illuminate\Database\Seeder;

class AttractionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Attractions::factory()
            ->count(5)
            ->create();
    }
}
