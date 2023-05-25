<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Booking;

use App\Models\Toursite;
use App\Models\Accomodations;
use App\Models\Transportation;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookingControllerTest extends TestCase
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
    public function it_displays_index_view_with_bookings(): void
    {
        $bookings = Booking::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('bookings.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.bookings.index')
            ->assertViewHas('bookings');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_booking(): void
    {
        $response = $this->get(route('bookings.create'));

        $response->assertOk()->assertViewIs('app.bookings.create');
    }

    /**
     * @test
     */
    public function it_stores_the_booking(): void
    {
        $data = Booking::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('bookings.store'), $data);

        $this->assertDatabaseHas('bookings', $data);

        $booking = Booking::latest('id')->first();

        $response->assertRedirect(route('bookings.edit', $booking));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_booking(): void
    {
        $booking = Booking::factory()->create();

        $response = $this->get(route('bookings.show', $booking));

        $response
            ->assertOk()
            ->assertViewIs('app.bookings.show')
            ->assertViewHas('booking');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_booking(): void
    {
        $booking = Booking::factory()->create();

        $response = $this->get(route('bookings.edit', $booking));

        $response
            ->assertOk()
            ->assertViewIs('app.bookings.edit')
            ->assertViewHas('booking');
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

        $response = $this->put(route('bookings.update', $booking), $data);

        $data['id'] = $booking->id;

        $this->assertDatabaseHas('bookings', $data);

        $response->assertRedirect(route('bookings.edit', $booking));
    }

    /**
     * @test
     */
    public function it_deletes_the_booking(): void
    {
        $booking = Booking::factory()->create();

        $response = $this->delete(route('bookings.destroy', $booking));

        $response->assertRedirect(route('bookings.index'));

        $this->assertModelMissing($booking);
    }
}
