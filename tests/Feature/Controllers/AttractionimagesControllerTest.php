<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Attractionimages;

use App\Models\Attractions;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AttractionimagesControllerTest extends TestCase
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
    public function it_displays_index_view_with_all_attractionimages(): void
    {
        $allAttractionimages = Attractionimages::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('all-attractionimages.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_attractionimages.index')
            ->assertViewHas('allAttractionimages');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_attractionimages(): void
    {
        $response = $this->get(route('all-attractionimages.create'));

        $response->assertOk()->assertViewIs('app.all_attractionimages.create');
    }

    /**
     * @test
     */
    public function it_stores_the_attractionimages(): void
    {
        $data = Attractionimages::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('all-attractionimages.store'), $data);

        $this->assertDatabaseHas('attractionimages', $data);

        $attractionimages = Attractionimages::latest('id')->first();

        $response->assertRedirect(
            route('all-attractionimages.edit', $attractionimages)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_attractionimages(): void
    {
        $attractionimages = Attractionimages::factory()->create();

        $response = $this->get(
            route('all-attractionimages.show', $attractionimages)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.all_attractionimages.show')
            ->assertViewHas('attractionimages');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_attractionimages(): void
    {
        $attractionimages = Attractionimages::factory()->create();

        $response = $this->get(
            route('all-attractionimages.edit', $attractionimages)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.all_attractionimages.edit')
            ->assertViewHas('attractionimages');
    }

    /**
     * @test
     */
    public function it_updates_the_attractionimages(): void
    {
        $attractionimages = Attractionimages::factory()->create();

        $attractions = Attractions::factory()->create();

        $data = [
            'description' => $this->faker->sentence(5),
            'attractions_id' => $attractions->id,
        ];

        $response = $this->put(
            route('all-attractionimages.update', $attractionimages),
            $data
        );

        $data['id'] = $attractionimages->id;

        $this->assertDatabaseHas('attractionimages', $data);

        $response->assertRedirect(
            route('all-attractionimages.edit', $attractionimages)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_attractionimages(): void
    {
        $attractionimages = Attractionimages::factory()->create();

        $response = $this->delete(
            route('all-attractionimages.destroy', $attractionimages)
        );

        $response->assertRedirect(route('all-attractionimages.index'));

        $this->assertModelMissing($attractionimages);
    }
}
