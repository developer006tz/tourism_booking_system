<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Accomodations;

use App\Models\Toursite;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccomodationsControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_all_accomodations(): void
    {
        $allAccomodations = Accomodations::factory()
            ->count(1)
            ->create();

        $response = $this->get(route('all-accomodations.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_accomodations.index')
            ->assertViewHas('allAccomodations');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_accomodations(): void
    {
        $response = $this->get(route('all-accomodations.create'));

        $response->assertOk()->assertViewIs('app.all_accomodations.create');
    }

    /**
     * @test
     */
    public function it_stores_the_accomodations(): void
    {
        $data = Accomodations::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('all-accomodations.store'), $data);

        $this->assertDatabaseHas('accomodations', $data);

        $accomodations = Accomodations::latest('id')->first();

        $response->assertRedirect(
            route('all-accomodations.edit', $accomodations)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_accomodations(): void
    {
        $accomodations = Accomodations::factory()->create();

        $response = $this->get(route('all-accomodations.show', $accomodations));

        $response
            ->assertOk()
            ->assertViewIs('app.all_accomodations.show')
            ->assertViewHas('accomodations');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_accomodations(): void
    {
        $accomodations = Accomodations::factory()->create();

        $response = $this->get(route('all-accomodations.edit', $accomodations));

        $response
            ->assertOk()
            ->assertViewIs('app.all_accomodations.edit')
            ->assertViewHas('accomodations');
    }

    /**
     * @test
     */
    public function it_updates_the_accomodations(): void
    {
        $accomodations = Accomodations::factory()->create();

        $toursite = Toursite::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'type' => 'hotel',
            'sleep_service' => 'yes',
            'description' => $this->faker->sentence(2),
            'local_night_fee' => $this->faker->randomNumber(2),
            'international_night_fee' => $this->faker->randomNumber(2),
            'food_service' => 'yes',
            'food_types_and_price' => $this->faker->text(),
            'is_inside_park' => 'yes',
            'distance_to_tour_site' => $this->faker->randomNumber(1),
            'room_available' => $this->faker->randomNumber(0),
            'toursite_id' => $toursite->id,
        ];

        $response = $this->put(
            route('all-accomodations.update', $accomodations),
            $data
        );

        $data['id'] = $accomodations->id;

        $this->assertDatabaseHas('accomodations', $data);

        $response->assertRedirect(
            route('all-accomodations.edit', $accomodations)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_accomodations(): void
    {
        $accomodations = Accomodations::factory()->create();

        $response = $this->delete(
            route('all-accomodations.destroy', $accomodations)
        );

        $response->assertRedirect(route('all-accomodations.index'));

        $this->assertModelMissing($accomodations);
    }
}
