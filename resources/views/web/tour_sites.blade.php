@extends('web_app')
@section('web_title')
    Tour sites
@endsection
@section('web_content')
<div class="contaner mt-4" style="margin-top:20px;height:20px;width:100%;"></div>
    <!-- Tours Start -->
    <div class="container-xxl my-4 py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Tourist sites</h6>
                {{-- create a page title and search bar here which are in the same row  --}}
                <div class="row my-4">
                    <div class="col-md-6">
                        <h1 class="text-center">Tourist sites</h1>
                    </div>
                    <div class="col-md-6">
                        <form>
                            <div class="input-group">
                                <input type="text" name="search" value="{{ $search ?? '' }}"  class="form-control" placeholder="Search for tourist sites" autocomplete="off" required>
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>

                
            </div>
            <div class="row g-4 justify-content-center">
                @forelse($toursites as $toursite)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="package-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ $toursite->allToursiteimages ? url(\Storage::url($toursite->allToursiteimages->first()->image)) : '' }}" alt="{{$toursite->name ?? '-'}}">
                        </div>
                        <div class="d-flex border-bottom">
                            <small class="flex-fill text-center border-end py-2"><i class="fas fa-globe-africa text-primary me-2"></i> {{$toursite->country->name ?? '-'}}</small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt text-primary me-2"></i> {{$toursite->region ?? '-'}}</small>
                            <small class="flex-fill text-center py-2"><i class="fas fa-map-marked-alt me-2"></i>{{$toursite->distance ?? '-'}} Km</small>
                        </div>
                        <div class="text-center p-4">
                            <h3 class="mb-0"> {{$toursite->name ?? '-'}} </h3>
                            
                            <p>{{Str::limit($toursite->description,150) ?? '-'}} </p>
                            <div class="d-flex justify-content-center mb-2">
                                <a href="{{ route('tour_site.show', $toursite) }}" class="btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                                <a href="#" class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                {{-- create back button  --}}
                <div class="row my-4 d-flex">
                    
                    <div class="col-md-6">
                        <a href="{{ route('tour.sites') }}" class="btn btn-primary text-right">Back</a>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-left">No Sites Added Yet..</h6>
                    </div>
                </div>
            </div>
                @endforelse

                
            </div>
        </div>
    </div>
    <!-- Package End -->
@endsection