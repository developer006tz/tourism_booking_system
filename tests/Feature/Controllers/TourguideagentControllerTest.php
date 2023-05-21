<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Tourguideagent;

use App\Models\Toursite;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TourguideagentControllerTest extends TestCase
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
    public function it_displays_index_view_with_tourguideagents(): void
    {
        $tourguideagents = Tourguideagent::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('tourguideagents.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.tourguideagents.index')
            ->assertViewHas('tourguideagents');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_tourguideagent(): void
    {
        $response = $this->get(route('tourguideagents.create'));

        $response->assertOk()->assertViewIs('app.tourguideagents.create');
    }

    /**
     * @test
     */
    public function it_stores_the_tourguideagent(): void
    {
        $data = Tourguideagent::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('tourguideagents.store'), $data);

        $this->assertDatabaseHas('tourguideagents', $data);

        $tourguideagent = Tourguideagent::latest('id')->first();

        $response->assertRedirect(
            route('tourguideagents.edit', $tourguideagent)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_tourguideagent(): void
    {
        $tourguideagent = Tourguideagent::factory()->create();

        $response = $this->get(route('tourguideagents.show', $tourguideagent));

        $response
            ->assertOk()
            ->assertViewIs('app.tourguideagents.show')
            ->assertViewHas('tourguideagent');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_tourguideagent(): void
    {
        $tourguideagent = Tourguideagent::factory()->create();

        $response = $this->get(route('tourguideagents.edit', $tourguideagent));

        $response
            ->assertOk()
            ->assertViewIs('app.tourguideagents.edit')
            ->assertViewHas('tourguideagent');
    }

    /**
     * @test
     */
    public function it_updates_the_tourguideagent(): void
    {
        $tourguideagent = Tourguideagent::factory()->create();

        $toursite = Toursite::factory()->create();
        $user = User::factory()->create();

        $data = [
            'title' => $this->faker->sentence(10),
            'description' => $this->faker->sentence(5),
            'guide_price_per_day' => $this->faker->randomNumber(2),
            'rating' => $this->faker->randomNumber(1),
            'distance_covered' => $this->faker->randomNumber(2),
            'toursite_id' => $toursite->id,
            'user_id' => $user->id,
        ];

        $response = $this->put(
            route('tourguideagents.update', $tourguideagent),
            $data
        );

        $data['id'] = $tourguideagent->id;

        $this->assertDatabaseHas('tourguideagents', $data);

        $response->assertRedirect(
            route('tourguideagents.edit', $tourguideagent)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_tourguideagent(): void
    {
        $tourguideagent = Tourguideagent::factory()->create();

        $response = $this->delete(
            route('tourguideagents.destroy', $tourguideagent)
        );

        $response->assertRedirect(route('tourguideagents.index'));

        $this->assertModelMissing($tourguideagent);
    }
}
