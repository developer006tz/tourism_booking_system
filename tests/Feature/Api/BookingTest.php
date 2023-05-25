<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Booking;

use App\Models\Toursite;
use App\Models\Accomodations;
use App\Models\Transportation;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookingTest extends TestCase
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
    public function it_gets_bookings_list(): void
    {
        $bookings = Booking::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.bookings.index'));

        $response->assertOk()->assertSee($bookings[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_booking(): void
    {
        $data = Booking::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.bookings.store'), $data);

        $this->assertDatabaseHas('bookings', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_booking(): void
    {
        $booking = Booking::factory()->create();

        $user = User::factory()->create();
        $toursite = Toursite::factory()->create();
        $transportation = Transportation::factory()->create();
        $accomodations = Accomodations::factory()->create();

        $data = [
            'user_id' => $user->id,
            'toursite_id' => $toursite->id,
            'transportation_id' => $transportation->id,
            'accomodations_id' => $accomodations->id,
        ];

        $response = $this->putJson(
            route('api.bookings.update', $booking),
            $data
        );

        $data['id'] = $booking->id;

        $this->assertDatabaseHas('bookings', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_booking(): void
    {
        $booking = Booking::factory()->create();

        $response = $this->deleteJson(route('api.bookings.destroy', $booking));

        $this->assertModelMissing($booking);

        $response->assertNoContent();
    }
}
