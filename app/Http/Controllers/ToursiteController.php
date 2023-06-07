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
            ->route('toursites.index', $toursite)
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


    public function web_tour_sites(Request $request): View
    {
        $search = $request->get('search', '');

        //Return toursites as well as toursites_images which toursite_id is equal to toursite_id in toursites table
        $toursites = Toursite::search($search)
            ->with('allToursiteimages')
            ->latest()
            ->paginate(5)
            ->withQueryString();
        return view('web.tour_sites', compact('toursites', 'search'));
    }

    public function web_show_tour_site(Request $request, Toursite $toursite): View
    {

        
        $toursite->load('allToursiteimages');
        return view('web.single_tour_site', compact('toursite'));
    }

    public function about_us(): View
    {
      
        return view('web.about_us');
    }

    public function services(): View
    {

        return view('web.services');
    }

    public function contact_us(): View
    {

        return view('web.contact_us');
    }

    public function website_index(): View
    {
        $toursites = Toursite::with('allToursiteimages')->latest()->paginate(5);
        return view('welcome', compact('toursites'));
    }

}
