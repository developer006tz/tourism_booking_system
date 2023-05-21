<?php

namespace Database\Seeders;

use App\Models\Accomodations;
use Illuminate\Database\Seeder;

class AccomodationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Accomodations::factory()
            ->count(5)
            ->create();
    }
}
