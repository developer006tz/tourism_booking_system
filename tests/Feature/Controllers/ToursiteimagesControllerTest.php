<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Toursiteimages;

use App\Models\Toursite;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ToursiteimagesControllerTest extends TestCase
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
    public function it_displays_index_view_with_all_toursiteimages(): void
    {
        $allToursiteimages = Toursiteimages::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('all-toursiteimages.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_toursiteimages.index')
            ->assertViewHas('allToursiteimages');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_toursiteimages(): void
    {
        $response = $this->get(route('all-toursiteimages.create'));

        $response->assertOk()->assertViewIs('app.all_toursiteimages.create');
    }

    /**
     * @test
     */
    public function it_stores_the_toursiteimages(): void
    {
        $data = Toursiteimages::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('all-toursiteimages.store'), $data);

        $this->assertDatabaseHas('toursiteimages', $data);

        $toursiteimages = Toursiteimages::latest('id')->first();

        $response->assertRedirect(
            route('all-toursiteimages.edit', $toursiteimages)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_toursiteimages(): void
    {
        $toursiteimages = Toursiteimages::factory()->create();

        $response = $this->get(
            route('all-toursiteimages.show', $toursiteimages)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.all_toursiteimages.show')
            ->assertViewHas('toursiteimages');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_toursiteimages(): void
    {
        $toursiteimages = Toursiteimages::factory()->create();

        $response = $this->get(
            route('all-toursiteimages.edit', $toursiteimages)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.all_toursiteimages.edit')
            ->assertViewHas('toursiteimages');
    }

    /**
     * @test
     */
    public function it_updates_the_toursiteimages(): void
    {
        $toursiteimages = Toursiteimages::factory()->create();

        $toursite = Toursite::factory()->create();

        $data = [
            'description' => $this->faker->sentence(15),
            'toursite_id' => $toursite->id,
        ];

        $response = $this->put(
            route('all-toursiteimages.update', $toursiteimages),
            $data
        );

        $data['id'] = $toursiteimages->id;

        $this->assertDatabaseHas('toursiteimages', $data);

        $response->assertRedirect(
            route('all-toursiteimages.edit', $toursiteimages)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_toursiteimages(): void
    {
        $toursiteimages = Toursiteimages::factory()->create();

        $response = $this->delete(
            route('all-toursiteimages.destroy', $toursiteimages)
        );

        $response->assertRedirect(route('all-toursiteimages.index'));

        $this->assertModelMissing($toursiteimages);
    }
}
