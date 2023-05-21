<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
            ]);
        $this->call(PermissionsSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ToursiteSeeder::class);
        $this->call(ToursiteimagesSeeder::class);
        $this->call(TourchallengesSeeder::class);
        $this->call(AttractionsSeeder::class);
        $this->call(AttractionimagesSeeder::class);
        $this->call(AccomodationsSeeder::class);
        $this->call(AccomodationimagesSeeder::class);
        $this->call(TransportationSeeder::class);
        $this->call(TourguideagentSeeder::class);
        
        
       
    }
}
