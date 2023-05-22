<?php

namespace App\Http\Controllers;

use App\Models\Toursite;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Transportation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\TransportationStoreRequest;
use App\Http\Requests\TransportationUpdateRequest;
use Intervention\Image\Facades\Image;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;

class TransportationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Transportation::class);

        $search = $request->get('search', '');

        $allTransportation = Transportation::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.all_transportation.index',
            compact('allTransportation', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Transportation::class);

        $toursites = Toursite::pluck('name', 'id');

        return view('app.all_transportation.create', compact('toursites'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransportationStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Transportation::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $transportation = Transportation::create($validated);

        return redirect()
            ->route('all-transportation.edit', $transportation)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Transportation $transportation): View
    {
        $this->authorize('view', $transportation);

        return view('app.all_transportation.show', compact('transportation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Transportation $transportation): View
    {
        $this->authorize('update', $transportation);

        $toursites = Toursite::pluck('name', 'id');

        return view(
            'app.all_transportation.edit',
            compact('transportation', 'toursites')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        TransportationUpdateRequest $request,
        Transportation $transportation
    ): RedirectResponse {
        $this->authorize('update', $transportation);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $toursite = Toursite::find($request->toursite_id);
            $filename = str_replace(' ', '-', strtolower($toursite->name)) . '-' . time() . '-' . str_replace(' ', '-', substr(strtolower($request->type ?? $toursite->name), 0, 25)) . '.jpg';
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(408, 272);
            $image_resize->encode('jpg', 75);
            $image_resize->save(storage_path('app/public/' . $filename));

            if ($transportation->image) {
                if (file_exists(storage_path('app/public/' . $transportation->image))) {
                    unlink(storage_path('app/public/' . $transportation->image));
                }
            }

            $validated['image'] = $filename;
        }

        $transportation->update($validated);

        return redirect()
            ->route('all-transportation.edit', $transportation)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Transportation $transportation
    ): RedirectResponse {
        $this->authorize('delete', $transportation);

        if ($transportation->image) {
            Storage::delete($transportation->image);
        }

        $transportation->delete();

        return redirect()
            ->route('all-transportation.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
