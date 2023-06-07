<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ToursiteController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AttractionsController;
use App\Http\Controllers\AccomodationsController;
use App\Http\Controllers\TransportationController;
use App\Http\Controllers\TourguideagentController;
use App\Http\Controllers\TourchallengesController;
use App\Http\Controllers\ToursiteimagesController;
use App\Http\Controllers\AttractionimagesController;
use App\Http\Controllers\AccomodationimagesController;


// website routes start here________________________________________________________
Route::get('/', function () {
    return view('welcome');
});

Route::get('tour-sites', [
    ToursiteController::class,
    'web_tour_sites',
])->name('tour.sites');

Route::get('tour-sites/{toursite}', [
    ToursiteController::class,
    'web_show_tour_site',
])->name('tour_site.show');

Route::get('tour-sites-about', [
    ToursiteController::class,
    'about_us',
])->name('tour_site.about');

Route::get('tour-sites-services', [
    ToursiteController::class,
    'services',
])->name('tour_site.services');

Route::get('tour-sites-contact', [
    ToursiteController::class,
    'contact_us',
])->name('tour_site.contact_us');


// website route ends here _________________________________________________________

// admin routes start here________________________________________________________

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::get('tour-booking', [
            HomeController::class,
            'welcome',
        ])->name('website.index');
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::resource('toursites', ToursiteController::class);
        Route::get('all-attractions', [
            AttractionsController::class,
            'index',
        ])->name('all-attractions.index');
        Route::post('all-attractions', [
            AttractionsController::class,
            'store',
        ])->name('all-attractions.store');
        Route::get('all-attractions/create', [
            AttractionsController::class,
            'create',
        ])->name('all-attractions.create');
        Route::get('all-attractions/{attractions}', [
            AttractionsController::class,
            'show',
        ])->name('all-attractions.show');
        Route::get('all-attractions/{attractions}/edit', [
            AttractionsController::class,
            'edit',
        ])->name('all-attractions.edit');
        Route::put('all-attractions/{attractions}', [
            AttractionsController::class,
            'update',
        ])->name('all-attractions.update');
        Route::delete('all-attractions/{attractions}', [
            AttractionsController::class,
            'destroy',
        ])->name('all-attractions.destroy');

        Route::get('all-attractionimages', [
            AttractionimagesController::class,
            'index',
        ])->name('all-attractionimages.index');
        Route::post('all-attractionimages', [
            AttractionimagesController::class,
            'store',
        ])->name('all-attractionimages.store');
        Route::get('all-attractionimages/create', [
            AttractionimagesController::class,
            'create',
        ])->name('all-attractionimages.create');
        Route::get('all-attractionimages/{attractionimages}', [
            AttractionimagesController::class,
            'show',
        ])->name('all-attractionimages.show');
        Route::get('all-attractionimages/{attractionimages}/edit', [
            AttractionimagesController::class,
            'edit',
        ])->name('all-attractionimages.edit');
        Route::put('all-attractionimages/{attractionimages}', [
            AttractionimagesController::class,
            'update',
        ])->name('all-attractionimages.update');
        Route::delete('all-attractionimages/{attractionimages}', [
            AttractionimagesController::class,
            'destroy',
        ])->name('all-attractionimages.destroy');

        Route::resource('countries', CountryController::class);
        Route::get('all-accomodations', [
            AccomodationsController::class,
            'index',
        ])->name('all-accomodations.index');
        Route::post('all-accomodations', [
            AccomodationsController::class,
            'store',
        ])->name('all-accomodations.store');
        Route::get('all-accomodations/create', [
            AccomodationsController::class,
            'create',
        ])->name('all-accomodations.create');
        Route::get('all-accomodations/{accomodations}', [
            AccomodationsController::class,
            'show',
        ])->name('all-accomodations.show');
        Route::get('all-accomodations/{accomodations}/edit', [
            AccomodationsController::class,
            'edit',
        ])->name('all-accomodations.edit');
        Route::put('all-accomodations/{accomodations}', [
            AccomodationsController::class,
            'update',
        ])->name('all-accomodations.update');
        Route::delete('all-accomodations/{accomodations}', [
            AccomodationsController::class,
            'destroy',
        ])->name('all-accomodations.destroy');

        Route::get('all-accomodationimages', [
            AccomodationimagesController::class,
            'index',
        ])->name('all-accomodationimages.index');
        Route::post('all-accomodationimages', [
            AccomodationimagesController::class,
            'store',
        ])->name('all-accomodationimages.store');
        Route::get('all-accomodationimages/create', [
            AccomodationimagesController::class,
            'create',
        ])->name('all-accomodationimages.create');
        Route::get('all-accomodationimages/{accomodationimages}', [
            AccomodationimagesController::class,
            'show',
        ])->name('all-accomodationimages.show');
        Route::get('all-accomodationimages/{accomodationimages}/edit', [
            AccomodationimagesController::class,
            'edit',
        ])->name('all-accomodationimages.edit');
        Route::put('all-accomodationimages/{accomodationimages}', [
            AccomodationimagesController::class,
            'update',
        ])->name('all-accomodationimages.update');
        Route::delete('all-accomodationimages/{accomodationimages}', [
            AccomodationimagesController::class,
            'destroy',
        ])->name('all-accomodationimages.destroy');

        Route::get('all-transportation', [
            TransportationController::class,
            'index',
        ])->name('all-transportation.index');
        Route::post('all-transportation', [
            TransportationController::class,
            'store',
        ])->name('all-transportation.store');
        Route::get('all-transportation/create', [
            TransportationController::class,
            'create',
        ])->name('all-transportation.create');
        Route::get('all-transportation/{transportation}', [
            TransportationController::class,
            'show',
        ])->name('all-transportation.show');
        Route::get('all-transportation/{transportation}/edit', [
            TransportationController::class,
            'edit',
        ])->name('all-transportation.edit');
        Route::put('all-transportation/{transportation}', [
            TransportationController::class,
            'update',
        ])->name('all-transportation.update');
        Route::delete('all-transportation/{transportation}', [
            TransportationController::class,
            'destroy',
        ])->name('all-transportation.destroy');

        Route::resource('users', UserController::class);
        Route::resource('tourguideagents', TourguideagentController::class);
        Route::get('all-tourchallenges', [
            TourchallengesController::class,
            'index',
        ])->name('all-tourchallenges.index');
        Route::post('all-tourchallenges', [
            TourchallengesController::class,
            'store',
        ])->name('all-tourchallenges.store');
        Route::get('all-tourchallenges/create', [
            TourchallengesController::class,
            'create',
        ])->name('all-tourchallenges.create');
        Route::get('all-tourchallenges/{tourchallenges}', [
            TourchallengesController::class,
            'show',
        ])->name('all-tourchallenges.show');
        Route::get('all-tourchallenges/{tourchallenges}/edit', [
            TourchallengesController::class,
            'edit',
        ])->name('all-tourchallenges.edit');
        Route::put('all-tourchallenges/{tourchallenges}', [
            TourchallengesController::class,
            'update',
        ])->name('all-tourchallenges.update');
        Route::delete('all-tourchallenges/{tourchallenges}', [
            TourchallengesController::class,
            'destroy',
        ])->name('all-tourchallenges.destroy');

        Route::get('all-toursiteimages', [
            ToursiteimagesController::class,
            'index',
        ])->name('all-toursiteimages.index');
        Route::post('all-toursiteimages', [
            ToursiteimagesController::class,
            'store',
        ])->name('all-toursiteimages.store');
        Route::get('all-toursiteimages/create', [
            ToursiteimagesController::class,
            'create',
        ])->name('all-toursiteimages.create');
        Route::get('all-toursiteimages/{toursiteimages}', [
            ToursiteimagesController::class,
            'show',
        ])->name('all-toursiteimages.show');
        Route::get('all-toursiteimages/{toursiteimages}/edit', [
            ToursiteimagesController::class,
            'edit',
        ])->name('all-toursiteimages.edit');
        Route::put('all-toursiteimages/{toursiteimages}', [
            ToursiteimagesController::class,
            'update',
        ])->name('all-toursiteimages.update');
        Route::delete('all-toursiteimages/{toursiteimages}', [
            ToursiteimagesController::class,
            'destroy',
        ])->name('all-toursiteimages.destroy');

        Route::resource('bookings', BookingController::class);
    });
