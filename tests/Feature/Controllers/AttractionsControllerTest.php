<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Attractions;

use App\Models\Toursite;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AttractionsControllerTest extends TestCase
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
    public function it_displays_index_view_with_all_attractions(): void
    {
        $allAttractions = Attractions::factory()
            ->count(1)
            ->create();

        $response = $this->get(route('all-attractions.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_attractions.index')
            ->assertViewHas('allAttractions');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_attractions(): void
    {
        $response = $this->get(route('all-attractions.create'));

        $response->assertOk()->assertViewIs('app.all_attractions.create');
    }

    /**
     * @test
     */
    public function it_stores_the_attractions(): void
    {
        $data = Attractions::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('all-attractions.store'), $data);

        $this->assertDatabaseHas('attractions', $data);

        $attractions = Attractions::latest('id')->first();

        $response->assertRedirect(route('all-attractions.edit', $attractions));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_attractions(): void
    {
        $attractions = Attractions::factory()->create();

        $response = $this->get(route('all-attractions.show', $attractions));

        $response
            ->assertOk()
            ->assertViewIs('app.all_attractions.show')
            ->assertViewHas('attractions');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_attractions(): void
    {
        $attractions = Attractions::factory()->create();

        $response = $this->get(route('all-attractions.edit', $attractions));

        $response
            ->assertOk()
            ->assertViewIs('app.all_attractions.edit')
            ->assertViewHas('attractions');
    }

    /**
     * @test
     */
    public function it_updates_the_attractions(): void
    {
        $attractions = Attractions::factory()->create();

        $toursite = Toursite::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(2),
            'distance' => $this->faker->randomFloat(2, 0, 9999),
            'toursite_id' => $toursite->id,
        ];

        $response = $this->put(
            route('all-attractions.update', $attractions),
            $data
        );

        $data['id'] = $attractions->id;

        $this->assertDatabaseHas('attractions', $data);

        $response->assertRedirect(route('all-attractions.edit', $attractions));
    }

    /**
     * @test
     */
    public function it_deletes_the_attractions(): void
    {
        $attractions = Attractions::factory()->create();

        $response = $this->delete(
            route('all-attractions.destroy', $attractions)
        );

        $response->assertRedirect(route('all-attractions.index'));

        $this->assertModelMissing($attractions);
    }
}
