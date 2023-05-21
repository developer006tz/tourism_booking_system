<?php

namespace App\Http\Controllers;

use App\Models\Toursite;
use Illuminate\View\View;
use App\Models\Attractions;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AttractionsStoreRequest;
use App\Http\Requests\AttractionsUpdateRequest;

class AttractionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Attractions::class);

        $search = $request->get('search', '');

        $allAttractions = Attractions::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.all_attractions.index',
            compact('allAttractions', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Attractions::class);

        $toursites = Toursite::pluck('name', 'id');

        return view('app.all_attractions.create', compact('toursites'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AttractionsStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Attractions::class);

        $validated = $request->validated();

        $attractions = Attractions::create($validated);

        return redirect()
            ->route('all-attractions.edit', $attractions)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Attractions $attractions): View
    {
        $this->authorize('view', $attractions);

        return view('app.all_attractions.show', compact('attractions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Attractions $attractions): View
    {
        $this->authorize('update', $attractions);

        $toursites = Toursite::pluck('name', 'id');

        return view(
            'app.all_attractions.edit',
            compact('attractions', 'toursites')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        AttractionsUpdateRequest $request,
        Attractions $attractions
    ): RedirectResponse {
        $this->authorize('update', $attractions);

        $validated = $request->validated();

        $attractions->update($validated);

        return redirect()
            ->route('all-attractions.edit', $attractions)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Attractions $attractions
    ): RedirectResponse {
        $this->authorize('delete', $attractions);

        $attractions->delete();

        return redirect()
            ->route('all-attractions.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
