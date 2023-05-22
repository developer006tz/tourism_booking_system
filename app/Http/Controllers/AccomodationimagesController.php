<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Accomodations;
use App\Models\Accomodationimages;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AccomodationimagesStoreRequest;
use App\Http\Requests\AccomodationimagesUpdateRequest;
use Intervention\Image\Facades\Image;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use App\Models\Toursite;

class AccomodationimagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Accomodationimages::class);

        $search = $request->get('search', '');

        $allAccomodationimages = Accomodationimages::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.all_accomodationimages.index',
            compact('allAccomodationimages', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Accomodationimages::class);

        $allAccomodations = Accomodations::pluck('name', 'id');

        return view(
            'app.all_accomodationimages.create',
            compact('allAccomodations')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        AccomodationimagesStoreRequest $request
    ): RedirectResponse {
        $this->authorize('create', Accomodationimages::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $accomodation = Accomodations::find($request->accomodations_id);
            $filename = str_replace(' ', '-', strtolower($accomodation->name)) . '-' . time() . '-' . str_replace(' ', '-', substr(strtolower($request->description ?? $accomodation->name), 0, 25)) . '.jpg';
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(408, 272);
            $image_resize->encode('jpg', 75);
            $image_resize->save(storage_path('app/public/' . $filename));
            $validated['image'] = $filename;
        }
        $accomodationimages = Accomodationimages::create($validated);

        return redirect()
            ->route('all-accomodationimages.edit', $accomodationimages)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        Accomodationimages $accomodationimages
    ): View {
        $this->authorize('view', $accomodationimages);

        return view(
            'app.all_accomodationimages.show',
            compact('accomodationimages')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        Accomodationimages $accomodationimages
    ): View {
        $this->authorize('update', $accomodationimages);

        $allAccomodations = Accomodations::pluck('name', 'id');

        return view(
            'app.all_accomodationimages.edit',
            compact('accomodationimages', 'allAccomodations')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        AccomodationimagesUpdateRequest $request,
        Accomodationimages $accomodationimages
    ): RedirectResponse {
        $this->authorize('update', $accomodationimages);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($accomodationimages->image) {
                Storage::delete($accomodationimages->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $accomodationimages->update($validated);

        return redirect()
            ->route('all-accomodationimages.edit', $accomodationimages)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Accomodationimages $accomodationimages
    ): RedirectResponse {
        $this->authorize('delete', $accomodationimages);

        if ($accomodationimages->image) {
            Storage::delete($accomodationimages->image);
        }

        $accomodationimages->delete();

        return redirect()
            ->route('all-accomodationimages.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
