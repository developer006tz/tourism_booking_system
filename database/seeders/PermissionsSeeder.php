<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list allaccomodationimages']);
        Permission::create(['name' => 'view allaccomodationimages']);
        Permission::create(['name' => 'create allaccomodationimages']);
        Permission::create(['name' => 'update allaccomodationimages']);
        Permission::create(['name' => 'delete allaccomodationimages']);

        Permission::create(['name' => 'list allaccomodations']);
        Permission::create(['name' => 'view allaccomodations']);
        Permission::create(['name' => 'create allaccomodations']);
        Permission::create(['name' => 'update allaccomodations']);
        Permission::create(['name' => 'delete allaccomodations']);

        Permission::create(['name' => 'list allattractionimages']);
        Permission::create(['name' => 'view allattractionimages']);
        Permission::create(['name' => 'create allattractionimages']);
        Permission::create(['name' => 'update allattractionimages']);
        Permission::create(['name' => 'delete allattractionimages']);

        Permission::create(['name' => 'list allattractions']);
        Permission::create(['name' => 'view allattractions']);
        Permission::create(['name' => 'create allattractions']);
        Permission::create(['name' => 'update allattractions']);
        Permission::create(['name' => 'delete allattractions']);

        Permission::create(['name' => 'list bookings']);
        Permission::create(['name' => 'view bookings']);
        Permission::create(['name' => 'create bookings']);
        Permission::create(['name' => 'update bookings']);
        Permission::create(['name' => 'delete bookings']);

        Permission::create(['name' => 'list countries']);
        Permission::create(['name' => 'view countries']);
        Permission::create(['name' => 'create countries']);
        Permission::create(['name' => 'update countries']);
        Permission::create(['name' => 'delete countries']);

        Permission::create(['name' => 'list alltourchallenges']);
        Permission::create(['name' => 'view alltourchallenges']);
        Permission::create(['name' => 'create alltourchallenges']);
        Permission::create(['name' => 'update alltourchallenges']);
        Permission::create(['name' => 'delete alltourchallenges']);

        Permission::create(['name' => 'list tourguideagents']);
        Permission::create(['name' => 'view tourguideagents']);
        Permission::create(['name' => 'create tourguideagents']);
        Permission::create(['name' => 'update tourguideagents']);
        Permission::create(['name' => 'delete tourguideagents']);

        Permission::create(['name' => 'list toursites']);
        Permission::create(['name' => 'view toursites']);
        Permission::create(['name' => 'create toursites']);
        Permission::create(['name' => 'update toursites']);
        Permission::create(['name' => 'delete toursites']);

        Permission::create(['name' => 'list alltoursiteimages']);
        Permission::create(['name' => 'view alltoursiteimages']);
        Permission::create(['name' => 'create alltoursiteimages']);
        Permission::create(['name' => 'update alltoursiteimages']);
        Permission::create(['name' => 'delete alltoursiteimages']);

        Permission::create(['name' => 'list alltransportation']);
        Permission::create(['name' => 'view alltransportation']);
        Permission::create(['name' => 'create alltransportation']);
        Permission::create(['name' => 'update alltransportation']);
        Permission::create(['name' => 'delete alltransportation']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        //create user role tourist

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        $touristRole = Role::create(['name' => 'tourist']);
        //create tourist permissions
        $touristPermissions = Permission::whereIn('name', ['list allaccomodations', 'view allaccomodations', 'list allattractions', 'view allattractions', 'list alltourchallenges', 'view alltourchallenges', 'list toursites', 'view toursites', 'list alltransportation', 'view alltransportation', 'list tourguideagents', 'view tourguideagents' ])->get();
        $touristRole->givePermissionTo($touristPermissions);


        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
