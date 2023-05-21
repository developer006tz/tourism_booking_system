<?php

namespace App\Http\Controllers;

use App\Models\Toursite;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Toursiteimages;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ToursiteimagesStoreRequest;
use App\Http\Requests\ToursiteimagesUpdateRequest;
use Intervention\Image\Facades\Image;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;

class ToursiteimagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Toursiteimages::class);

        $search = $request->get('search', '');

        $allToursiteimages = Toursiteimages::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.all_toursiteimages.index',
            compact('allToursiteimages', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Toursiteimages::class);

        $toursites = Toursite::pluck('name', 'id');

        return view('app.all_toursiteimages.create', compact('toursites'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ToursiteimagesStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Toursiteimages::class);
        // dd($request->all());
        $validated = $request->validated();
        //fetch toursite name by toursite id
        $toursite = Toursite::find($request->toursite_id);
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = str_replace(' ', '-', strtolower($toursite->name)) . '-' . time() . '-' . str_replace(' ', '-', substr(strtolower($request->description ?? $toursite->name), 0, 25)) . '.jpg';
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(408, 272);
            $image_resize->encode('jpg', 75);
            $image_resize->save(storage_path('app/public/' . $filename));
            $validated['image'] = $filename;
        }

        $toursiteimages = Toursiteimages::create($validated);

        return redirect()
            ->route('all-toursiteimages.index', $toursiteimages)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Toursiteimages $toursiteimages): View
    {
        $this->authorize('view', $toursiteimages);

        return view('app.all_toursiteimages.show', compact('toursiteimages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Toursiteimages $toursiteimages): View
    {
        $this->authorize('update', $toursiteimages);

        $toursites = Toursite::pluck('name', 'id');

        return view(
            'app.all_toursiteimages.edit',
            compact('toursiteimages', 'toursites')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ToursiteimagesUpdateRequest $request,
        Toursiteimages $toursiteimages
    ): RedirectResponse {
        $this->authorize('update', $toursiteimages);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $toursite = Toursite::find($request->toursite_id);
            $filename = str_replace(' ', '-', strtolower($toursite->name)) . '-' . time() . '-' . str_replace(' ', '-', substr(strtolower($request->description ?? $toursite->name), 0, 25)) . '.jpg';
            $image_resize = Image::make($image->getRealPath());
            $image_resize-> resize(408, 272);
            $image_resize->encode('jpg', 75);
            $image_resize->save(storage_path('app/public/' . $filename));

            if ($toursiteimages->image) {
                if (file_exists(storage_path('app/public/' . $toursiteimages->image))) {
                    unlink(storage_path('app/public/' . $toursiteimages->image));
                }
            }

            $validated['image'] = $filename;
        }
        $toursiteimages->update($validated);

        return redirect()
            ->route('all-toursiteimages.edit', $toursiteimages)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Toursiteimages $toursiteimages
    ): RedirectResponse {
        $this->authorize('delete', $toursiteimages);

        if ($toursiteimages->image) {
            Storage::delete($toursiteimages->image);
        }

        $toursiteimages->delete();

        return redirect()
            ->route('all-toursiteimages.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
