<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Accomodationimages;

class AccomodationimagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Accomodationimages::factory()
            ->count(1)
            ->create();
    }
}
