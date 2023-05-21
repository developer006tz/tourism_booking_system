<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Accomodationimages;

use App\Models\Accomodations;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccomodationimagesControllerTest extends TestCase
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
    public function it_displays_index_view_with_all_accomodationimages(): void
    {
        $allAccomodationimages = Accomodationimages::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('all-accomodationimages.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_accomodationimages.index')
            ->assertViewHas('allAccomodationimages');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_accomodationimages(): void
    {
        $response = $this->get(route('all-accomodationimages.create'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_accomodationimages.create');
    }

    /**
     * @test
     */
    public function it_stores_the_accomodationimages(): void
    {
        $data = Accomodationimages::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('all-accomodationimages.store'), $data);

        $this->assertDatabaseHas('accomodationimages', $data);

        $accomodationimages = Accomodationimages::latest('id')->first();

        $response->assertRedirect(
            route('all-accomodationimages.edit', $accomodationimages)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_accomodationimages(): void
    {
        $accomodationimages = Accomodationimages::factory()->create();

        $response = $this->get(
            route('all-accomodationimages.show', $accomodationimages)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.all_accomodationimages.show')
            ->assertViewHas('accomodationimages');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_accomodationimages(): void
    {
        $accomodationimages = Accomodationimages::factory()->create();

        $response = $this->get(
            route('all-accomodationimages.edit', $accomodationimages)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.all_accomodationimages.edit')
            ->assertViewHas('accomodationimages');
    }

    /**
     * @test
     */
    public function it_updates_the_accomodationimages(): void
    {
        $accomodationimages = Accomodationimages::factory()->create();

        $accomodations = Accomodations::factory()->create();

        $data = [
            'type' => 'surroundings',
            'description' => $this->faker->sentence(15),
            'accomodations_id' => $accomodations->id,
        ];

        $response = $this->put(
            route('all-accomodationimages.update', $accomodationimages),
            $data
        );

        $data['id'] = $accomodationimages->id;

        $this->assertDatabaseHas('accomodationimages', $data);

        $response->assertRedirect(
            route('all-accomodationimages.edit', $accomodationimages)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_accomodationimages(): void
    {
        $accomodationimages = Accomodationimages::factory()->create();

        $response = $this->delete(
            route('all-accomodationimages.destroy', $accomodationimages)
        );

        $response->assertRedirect(route('all-accomodationimages.index'));

        $this->assertModelMissing($accomodationimages);
    }
}
