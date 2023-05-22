<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Tourchallenges;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\TourchallengesStoreRequest;
use App\Http\Requests\TourchallengesUpdateRequest;
use Intervention\Image\Facades\Image;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use App\Models\Toursite;

class TourchallengesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Tourchallenges::class);

        $search = $request->get('search', '');

        $allTourchallenges = Tourchallenges::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.all_tourchallenges.index',
            compact('allTourchallenges', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Tourchallenges::class);

        $users = User::pluck('name', 'id');

        return view('app.all_tourchallenges.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TourchallengesStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Tourchallenges::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $user = User::find($request->user_id);
            $filename = str_replace(' ', '-', strtolower($user->name)) . '-' . time() . '-' . str_replace(' ', '-', substr(strtolower($request->description ?? $user->name), 0, 25)) . '.jpg';
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(400, 400);
            $image_resize->encode('jpg', 75);
            $image_resize->save(storage_path('app/public/' . $filename));
            $validated['image'] = $filename;
        }

        $tourchallenges = Tourchallenges::create($validated);

        return redirect()
            ->route('all-tourchallenges.edit', $tourchallenges)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Tourchallenges $tourchallenges): View
    {
        $this->authorize('view', $tourchallenges);

        return view('app.all_tourchallenges.show', compact('tourchallenges'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Tourchallenges $tourchallenges): View
    {
        $this->authorize('update', $tourchallenges);

        $users = User::pluck('name', 'id');

        return view(
            'app.all_tourchallenges.edit',
            compact('tourchallenges', 'users')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        TourchallengesUpdateRequest $request,
        Tourchallenges $tourchallenges
    ): RedirectResponse {
        $this->authorize('update', $tourchallenges);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($tourchallenges->image) {
                Storage::delete($tourchallenges->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $tourchallenges->update($validated);

        return redirect()
            ->route('all-tourchallenges.edit', $tourchallenges)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Tourchallenges $tourchallenges
    ): RedirectResponse {
        $this->authorize('delete', $tourchallenges);

        if ($tourchallenges->image) {
            Storage::delete($tourchallenges->image);
        }

        $tourchallenges->delete();

        return redirect()
            ->route('all-tourchallenges.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
