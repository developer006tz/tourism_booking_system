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
        $bookings = \App\Models\Booking::all();
        //2.user (count)
        $userCount = \App\Models\User::count();
        //3.tour (count)
        $tourChallenge = \App\Models\Tourchallenges::count();
        //4.attraction (count)
        $attractionCount = \App\Models\Attractions::count();
        //5.accomodation (count) where type == 'hotel'
        $hotel = \App\Models\Accomodations::where('type', 'hotel')->count();
        //6.tour site (count)
        $toursiteCount = \App\Models\Toursite::count();
        $chartData = $this->getChartData($bookings);

        // dd($chartData);



        return view('home', compact('bookings', 'userCount', 'tourChallenge', 'attractionCount', 'hotel', 'toursiteCount', 'chartData'));
    }

    private function getChartData($bookings)
    {
        $years = [];
        $seriesA = [];
        $seriesB = [];

        foreach ($bookings as $booking) {
            $year = date('Y', strtotime($booking->created_at));

            if (!in_array($year, $years)) {
                array_push($years, $year);
                array_push($seriesA, 0);
                array_push($seriesB, 0);
            }

            $index = array_search($year, $years);
            $seriesA[$index]++;
            $seriesB[$index]++;
        }

        $chartData = [
            [
                'y' => $years,
                'a' => $seriesA,
                'b' => $seriesB
            ]
        ];

        return $chartData;

    }

}