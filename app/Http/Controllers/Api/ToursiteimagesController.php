<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Toursiteimages;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\ToursiteimagesResource;
use App\Http\Resources\ToursiteimagesCollection;
use App\Http\Requests\ToursiteimagesStoreRequest;
use App\Http\Requests\ToursiteimagesUpdateRequest;

class ToursiteimagesController extends Controller
{
    public function index(Request $request): ToursiteimagesCollection
    {
        $this->authorize('view-any', Toursiteimages::class);

        $search = $request->get('search', '');

        $allToursiteimages = Toursiteimages::search($search)
            ->latest()
            ->paginate();

        return new ToursiteimagesCollection($allToursiteimages);
    }

    public function store(
        ToursiteimagesStoreRequest $request
    ): ToursiteimagesResource {
        $this->authorize('create', Toursiteimages::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $toursiteimages = Toursiteimages::create($validated);

        return new ToursiteimagesResource($toursiteimages);
    }

    public function show(
        Request $request,
        Toursiteimages $toursiteimages
    ): ToursiteimagesResource {
        $this->authorize('view', $toursiteimages);

        return new ToursiteimagesResource($toursiteimages);
    }

    public function update(
        ToursiteimagesUpdateRequest $request,
        Toursiteimages $toursiteimages
    ): ToursiteimagesResource {
        $this->authorize('update', $toursiteimages);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($toursiteimages->image) {
                Storage::delete($toursiteimages->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $toursiteimages->update($validated);

        return new ToursiteimagesResource($toursiteimages);
    }

    public function destroy(
        Request $request,
        Toursiteimages $toursiteimages
    ): Response {
        $this->authorize('delete', $toursiteimages);

        if ($toursiteimages->image) {
            Storage::delete($toursiteimages->image);
        }

        $toursiteimages->delete();

        return response()->noContent();
    }
}
