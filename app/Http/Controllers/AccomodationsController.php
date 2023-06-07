<?php

namespace App\Http\Controllers;

use App\Models\Toursite;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Accomodations;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AccomodationsStoreRequest;
use App\Http\Requests\AccomodationsUpdateRequest;
use Intervention\Image\Facades\Image;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;


class AccomodationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Accomodations::class);

        $search = $request->get('search', '');

        $allAccomodations = Accomodations::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.all_accomodations.index',
            compact('allAccomodations', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Accomodations::class);

        $toursites = Toursite::pluck('name', 'id');

        return view('app.all_accomodations.create', compact('toursites'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AccomodationsStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Accomodations::class);

        $validated = $request->validated();

        $accomodations = Accomodations::create($validated);

        return redirect()
            ->route('all-accomodationimages.create', $accomodations)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Accomodations $accomodations): View
    {
        $this->authorize('view', $accomodations);

        return view('app.all_accomodations.show', compact('accomodations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Accomodations $accomodations): View
    {
        $this->authorize('update', $accomodations);

        $toursites = Toursite::pluck('name', 'id');

        return view(
            'app.all_accomodations.edit',
            compact('accomodations', 'toursites')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        AccomodationsUpdateRequest $request,
        Accomodations $accomodations
    ): RedirectResponse {
        $this->authorize('update', $accomodations);

        $validated = $request->validated();

        $accomodations->update($validated);

        return redirect()
            ->route('all-accomodations.edit', $accomodations)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Accomodations $accomodations
    ): RedirectResponse {
        $this->authorize('delete', $accomodations);

        $accomodations->delete();

        return redirect()
            ->route('all-accomodations.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
