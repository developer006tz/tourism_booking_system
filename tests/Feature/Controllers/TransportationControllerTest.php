<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Transportation;

use App\Models\Toursite;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransportationControllerTest extends TestCase
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
    public function it_displays_index_view_with_all_transportation(): void
    {
        $allTransportation = Transportation::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('all-transportation.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_transportation.index')
            ->assertViewHas('allTransportation');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_transportation(): void
    {
        $response = $this->get(route('all-transportation.create'));

        $response->assertOk()->assertViewIs('app.all_transportation.create');
    }

    /**
     * @test
     */
    public function it_stores_the_transportation(): void
    {
        $data = Transportation::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('all-transportation.store'), $data);

        $this->assertDatabaseHas('transportation', $data);

        $transportation = Transportation::latest('id')->first();

        $response->assertRedirect(
            route('all-transportation.edit', $transportation)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_transportation(): void
    {
        $transportation = Transportation::factory()->create();

        $response = $this->get(
            route('all-transportation.show', $transportation)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.all_transportation.show')
            ->assertViewHas('transportation');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_transportation(): void
    {
        $transportation = Transportation::factory()->create();

        $response = $this->get(
            route('all-transportation.edit', $transportation)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.all_transportation.edit')
            ->assertViewHas('transportation');
    }

    /**
     * @test
     */
    public function it_updates_the_transportation(): void
    {
        $transportation = Transportation::factory()->create();

        $toursite = Toursite::factory()->create();

        $data = [
            'type' => 'flight',
            'price' => $this->faker->randomFloat(2, 0, 9999),
            'distance_covered_in_km' => $this->faker->randomNumber(1),
            'toursite_id' => $toursite->id,
        ];

        $response = $this->put(
            route('all-transportation.update', $transportation),
            $data
        );

        $data['id'] = $transportation->id;

        $this->assertDatabaseHas('transportation', $data);

        $response->assertRedirect(
            route('all-transportation.edit', $transportation)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_transportation(): void
    {
        $transportation = Transportation::factory()->create();

        $response = $this->delete(
            route('all-transportation.destroy', $transportation)
        );

        $response->assertRedirect(route('all-transportation.index'));

        $this->assertModelMissing($transportation);
    }
}
