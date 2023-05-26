<?php

namespace Database\Seeders;

use App\Models\Tourguideagent;
use Illuminate\Database\Seeder;

class TourguideagentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tourguideagent::factory()
            ->count(1)
            ->create();
    }
}
