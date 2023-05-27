<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Attractions;
use Illuminate\Http\Request;
use App\Models\Attractionimages;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AttractionimagesStoreRequest;
use App\Http\Requests\AttractionimagesUpdateRequest;
use Intervention\Image\Facades\Image;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use App\Models\Toursite;

class AttractionimagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Attractionimages::class);

        $search = $request->get('search', '');

        $allAttractionimages = Attractionimages::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.all_attractionimages.index',
            compact('allAttractionimages', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Attractionimages::class);

        $allAttractions = Attractions::pluck('name', 'id');

        return view(
            'app.all_attractionimages.create',
            compact('allAttractions')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        AttractionimagesStoreRequest $request
    ): RedirectResponse {
        $this->authorize('create', Attractionimages::class);

        $validated = $request->validated();
       
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $filename = time() . rand(999, 9999999) . '.jpg';
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(408, 272);
                $image_resize->encode('jpg', 75);
                $image_resize->save(storage_path('app/public/' . $filename));
                Attractionimages::create([
                    'attractions_id' => $validated['attractions_id'],
                    'image' => $filename,
                    'description' => $validated['description'] ?? null,
                ]);
            }
        }
        return redirect()
            ->route('all-attractionimages.index')
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        Attractionimages $attractionimages
    ): View {
        $this->authorize('view', $attractionimages);

        return view(
            'app.all_attractionimages.show',
            compact('attractionimages')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        Attractionimages $attractionimages
    ): View {
        $this->authorize('update', $attractionimages);

        $allAttractions = Attractions::pluck('name', 'id');

        return view(
            'app.all_attractionimages.edit',
            compact('attractionimages', 'allAttractions')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        AttractionimagesUpdateRequest $request,
        Attractionimages $attractionimages
    ): RedirectResponse {
        $this->authorize('update', $attractionimages);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($attractionimages->image) {
                Storage::delete($attractionimages->image);
            }

            $validated['image'] = $request->file('image')[0]->store('public');
        }

        $attractionimages->update($validated);

        return redirect()
            ->route('all-attractionimages.edit', $attractionimages)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Attractionimages $attractionimages
    ): RedirectResponse {
        $this->authorize('delete', $attractionimages);

        if ($attractionimages->image) {
            Storage::delete($attractionimages->image);
        }

        $attractionimages->delete();

        return redirect()
            ->route('all-attractionimages.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
