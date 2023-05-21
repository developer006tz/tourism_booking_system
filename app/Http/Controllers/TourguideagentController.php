<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Toursite;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Tourguideagent;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\TourguideagentStoreRequest;
use App\Http\Requests\TourguideagentUpdateRequest;

class TourguideagentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Tourguideagent::class);

        $search = $request->get('search', '');

        $tourguideagents = Tourguideagent::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.tourguideagents.index',
            compact('tourguideagents', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Tourguideagent::class);

        $toursites = Toursite::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view(
            'app.tourguideagents.create',
            compact('toursites', 'users')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TourguideagentStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Tourguideagent::class);

        $validated = $request->validated();

        $tourguideagent = Tourguideagent::create($validated);

        return redirect()
            ->route('tourguideagents.edit', $tourguideagent)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Tourguideagent $tourguideagent): View
    {
        $this->authorize('view', $tourguideagent);

        return view('app.tourguideagents.show', compact('tourguideagent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Tourguideagent $tourguideagent): View
    {
        $this->authorize('update', $tourguideagent);

        $toursites = Toursite::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view(
            'app.tourguideagents.edit',
            compact('tourguideagent', 'toursites', 'users')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        TourguideagentUpdateRequest $request,
        Tourguideagent $tourguideagent
    ): RedirectResponse {
        $this->authorize('update', $tourguideagent);

        $validated = $request->validated();

        $tourguideagent->update($validated);

        return redirect()
            ->route('tourguideagents.edit', $tourguideagent)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Tourguideagent $tourguideagent
    ): RedirectResponse {
        $this->authorize('delete', $tourguideagent);

        $tourguideagent->delete();

        return redirect()
            ->route('tourguideagents.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
