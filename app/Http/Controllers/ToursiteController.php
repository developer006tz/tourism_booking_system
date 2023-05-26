<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Toursite;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ToursiteStoreRequest;
use App\Http\Requests\ToursiteUpdateRequest;
use Intervention\Image\Facades\Image;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;

class ToursiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Toursite::class);

        $search = $request->get('search', '');

        $toursites = Toursite::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.toursites.index', compact('toursites', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Toursite::class);

        $countries = Country::pluck('name', 'id');

        return view('app.toursites.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ToursiteStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Toursite::class);

        $validated = $request->validated();

        $toursite = Toursite::create($validated);

        return redirect()
            ->route('all-toursiteimages.create', $toursite)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Toursite $toursite): View
    {
        $this->authorize('view', $toursite);

        return view('app.toursites.show', compact('toursite'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Toursite $toursite): View
    {
        $this->authorize('update', $toursite);

        $countries = Country::pluck('name', 'id');

        return view('app.toursites.edit', compact('toursite', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ToursiteUpdateRequest $request,
        Toursite $toursite
    ): RedirectResponse {
        $this->authorize('update', $toursite);

        $validated = $request->validated();

        $toursite->update($validated);

        return redirect()
            ->route('toursites.edit', $toursite)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Toursite $toursite
    ): RedirectResponse {
        $this->authorize('delete', $toursite);

        $toursite->delete();

        return redirect()
            ->route('toursites.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
