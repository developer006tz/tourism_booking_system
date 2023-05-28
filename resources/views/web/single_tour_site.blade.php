@extends('web_app')
@section('web_title')
    Tour sites
@endsection
@section('web_content')
<div class="contaner mt-4" style="margin-top:20px;height:20px;width:100%;"></div>
    <!-- Tours Start -->
    <div class="container-xxl my-4 py-5">
        <div class="container">
            <div class="text-center wow fadeInUp mb-4" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3"> {{$toursite->name ?? '-'}}</h6>
                {{-- create a page title and search bar here which are in the same row  --}}
                
            </div>

            <div class="row g-4 text-left wow fadeInUp mb-4" data-wow-delay="0.1s">
               
                <div class="description">
                    <p>{{$toursite->description ?? '-'}}</p>
                </div>
                
            </div>
            <div class="row g-4 text-left wow fadeInUp mb-4" data-wow-delay="0.1s">
                <div class="description">
                    <b>Country | Region | District | Distance from region</b>
                    <p> {{$toursite->name ?? '-'}} is located in {{$toursite->country->name ?? '-'}} , {{$toursite->region ?? '-'}} in  {{$toursite->district ?? '-'}} district. The distance from {{$toursite->region ?? '-'}} town to The Site is {{$toursite->distance. ' KM' ?? '-'}}</p>
                </div>
            </div>

            <div class="row g-4 text-left wow fadeInUp mb-4" data-wow-delay="0.1s">
                <div class="description">
                    <b>Attractions</b>
                    <p>{{$toursite->attractions ?? '-'}}</p>
                </div>
            </div>

            <div class="row g-4 text-left wow fadeInUp mb-4" data-wow-delay="0.1s">
                <div class="description">
                    <b>Best time to visit</b>
                    <p>{{$toursite->time_of_visit ?? '-'}}</p>
                </div>
            </div>

            <div class="row g-4 text-left wow fadeInUp mb-4" data-wow-delay="0.1s">
               
                <div class="description">
                    <b>Accomodations</b>
                    <p>{{$toursite->accomodation ?? '-'}}</p>
                </div>
                
            </div>

            <div class="row g-4 text-left wow fadeInUp mb-4" data-wow-delay="0.1s">
               
                <div class="description">
                    <b>Fees</b>
                    <p>For Local citizens the fees to enter park is <b class="text-primary" >{{$toursite->local_price.' Tsh' ?? '0'}}</b>  and for international Tourists the fees is <b class="text-primary" >{{$toursite->international_price.' USD' ?? '0'}}</b></p>
                </div>
                
            </div>
            <div class="row g-4 justify-content-left">
                {{-- loop all toursite images here --}}
                @forelse($toursite->allToursiteimages as $toursiteimage)

                
                        <div class="col-lg-3 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="{{ $toursiteimage->image ? url(\Storage::url($toursiteimage->image)) : '' }}" alt="">
                            </a>
                        </div>
                    
            
                @empty
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                {{-- create back button  --}}
                <p>no images yet</p>
                </div>
                @endforelse
                
            </div>

             <div class="row my-4 d-flex">
                    
                    <div class="col-md-6">
                        <a href="{{ route('tour.sites') }}" class="btn btn-primary text-right">Back</a>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-left"></h6>
                    </div>
                </div>
        </div>
    </div>
    <!-- Package End -->
@endsection