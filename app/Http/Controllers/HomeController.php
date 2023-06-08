<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //return 1.booking (count), 2.user (count), 3.tour (count), 4.attraction (count), 5.accomodation (count) where type == 'hotel', 6.tour site (count)

        //1.booking (count)
        $bookingCount = \App\Models\Booking::count();
        //2.user (count)
        $userCount = \App\Models\User::count();
        //3.tour (count)
        $tourChallenge = \App\Models\Tourchallenges::count();
        //4.attraction (count)
        $attractionCount = \App\Models\Attractions::count();
        //5.accomodation (count) where type == 'hotel'
        $accomodationCount = \App\Models\Accomodations::where('type', 'hotel')->count();
        //6.tour site (count)
        $toursiteCount = \App\Models\Toursite::count();



        return view('home', compact('bookingCount', 'userCount', 'tourChallenge', 'attractionCount', 'accomodationCount', 'toursiteCount'));
    }
}
