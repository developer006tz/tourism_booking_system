<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Toursiteimages;

use App\Models\Toursite;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ToursiteimagesTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_all_toursiteimages_list(): void
    {
        $allToursiteimages = Toursiteimages::factory()
            ->count(1)
            ->create();

        $response = $this->getJson(route('api.all-toursiteimages.index'));

        $response->assertOk()->assertSee($allToursiteimages[0]->image);
    }

    /**
     * @test
     */
    public function it_stores_the_toursiteimages(): void
    {
        $data = Toursiteimages::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.all-toursiteimages.store'),
            $data
        );

        $this->assertDatabaseHas('toursiteimages', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_toursiteimages(): void
    {
        $toursiteimages = Toursiteimages::factory()->create();

        $toursite = Toursite::factory()->create();

        $data = [
            'description' => $this->faker->sentence(2),
            'toursite_id' => $toursite->id,
        ];

        $response = $this->putJson(
            route('api.all-toursiteimages.update', $toursiteimages),
            $data
        );

        $data['id'] = $toursiteimages->id;

        $this->assertDatabaseHas('toursiteimages', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_toursiteimages(): void
    {
        $toursiteimages = Toursiteimages::factory()->create();

        $response = $this->deleteJson(
            route('api.all-toursiteimages.destroy', $toursiteimages)
        );

        $this->assertModelMissing($toursiteimages);

        $response->assertNoContent();
    }
}
