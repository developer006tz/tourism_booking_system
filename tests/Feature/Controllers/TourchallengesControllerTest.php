<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Tourchallenges;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TourchallengesControllerTest extends TestCase
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
    public function it_displays_index_view_with_all_tourchallenges(): void
    {
        $allTourchallenges = Tourchallenges::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('all-tourchallenges.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_tourchallenges.index')
            ->assertViewHas('allTourchallenges');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_tourchallenges(): void
    {
        $response = $this->get(route('all-tourchallenges.create'));

        $response->assertOk()->assertViewIs('app.all_tourchallenges.create');
    }

    /**
     * @test
     */
    public function it_stores_the_tourchallenges(): void
    {
        $data = Tourchallenges::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('all-tourchallenges.store'), $data);

        $this->assertDatabaseHas('tourchallenges', $data);

        $tourchallenges = Tourchallenges::latest('id')->first();

        $response->assertRedirect(
            route('all-tourchallenges.edit', $tourchallenges)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_tourchallenges(): void
    {
        $tourchallenges = Tourchallenges::factory()->create();

        $response = $this->get(
            route('all-tourchallenges.show', $tourchallenges)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.all_tourchallenges.show')
            ->assertViewHas('tourchallenges');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_tourchallenges(): void
    {
        $tourchallenges = Tourchallenges::factory()->create();

        $response = $this->get(
            route('all-tourchallenges.edit', $tourchallenges)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.all_tourchallenges.edit')
            ->assertViewHas('tourchallenges');
    }

    /**
     * @test
     */
    public function it_updates_the_tourchallenges(): void
    {
        $tourchallenges = Tourchallenges::factory()->create();

        $user = User::factory()->create();

        $data = [
            'title' => $this->faker->sentence(10),
            'description' => $this->faker->sentence(5),
            'user_id' => $user->id,
        ];

        $response = $this->put(
            route('all-tourchallenges.update', $tourchallenges),
            $data
        );

        $data['id'] = $tourchallenges->id;

        $this->assertDatabaseHas('tourchallenges', $data);

        $response->assertRedirect(
            route('all-tourchallenges.edit', $tourchallenges)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_tourchallenges(): void
    {
        $tourchallenges = Tourchallenges::factory()->create();

        $response = $this->delete(
            route('all-tourchallenges.destroy', $tourchallenges)
        );

        $response->assertRedirect(route('all-tourchallenges.index'));

        $this->assertModelMissing($tourchallenges);
    }
}
