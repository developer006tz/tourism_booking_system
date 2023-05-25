<?php

namespace App\Http\Controllers\Api;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookingResource;
use App\Http\Resources\BookingCollection;
use App\Http\Requests\BookingStoreRequest;
use App\Http\Requests\BookingUpdateRequest;

class BookingController extends Controller
{
    public function index(Request $request): BookingCollection
    {
        $this->authorize('view-any', Booking::class);

        $search = $request->get('search', '');

        $bookings = Booking::search($search)
            ->latest()
            ->paginate();

        return new BookingCollection($bookings);
    }

    public function store(BookingStoreRequest $request): BookingResource
    {
        $this->authorize('create', Booking::class);

        $validated = $request->validated();

        $booking = Booking::create($validated);

        return new BookingResource($booking);
    }

    public function show(Request $request, Booking $booking): BookingResource
    {
        $this->authorize('view', $booking);

        return new BookingResource($booking);
    }

    public function update(
        BookingUpdateRequest $request,
        Booking $booking
    ): BookingResource {
        $this->authorize('update', $booking);

        $validated = $request->validated();

        $booking->update($validated);

        return new BookingResource($booking);
    }

    public function destroy(Request $request, Booking $booking): Response
    {
        $this->authorize('delete', $booking);

        $booking->delete();

        return response()->noContent();
    }
}
