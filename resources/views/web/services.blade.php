@extends('web_app')
@section('web_title')
    Our servises
@endsection
@section('web_content')
<div class="contaner mt-4" style="margin-top:20px;height:20px;width:100%;"></div>
    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Services</h6>
                <h1 class="mb-5">Our Services</h1>
            </div>
            <div class="row g-4">
                <a href="{{route('tour.sites')}}" class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                            <h5>Tanzania Safari Tours</h5>
                            <p>We arrange Best Tour Safari where you can go and Enjoy vacation time, with good attractions, Accomodations, and Transport services</p>
                        </div>
                    </div>
                </a>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-hotel text-primary mb-4"></i>
                            <h5>Hotel Reservation</h5>
                            <p>You can Book a hotel wherever you are even before vacation and we can preserve for you </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-user text-primary mb-4"></i>
                            <h5>Travel Guides</h5>
                            <p>Our site consists of professional Travel guides which can assists you in your day to day activities during vacation time.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fas fa-3x fa-plane-departure text-primary mb-4"></i>
                            <h5>Transport Services</h5>
                            <p>You can arrange your vacation starting booking for quality and affordable Transport Through our  website , From where you are to your desination.</p>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    <!-- Service End -->
@endsection