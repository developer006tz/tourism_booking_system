@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('toursites.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.toursites.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.toursites.inputs.name')</h5>
                    <span>{{ $toursite->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.toursites.inputs.country_id')</h5>
                    <span>{{ optional($toursite->country)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.toursites.inputs.other_name')</h5>
                    <span>{{ $toursite->other_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.toursites.inputs.description')</h5>
                    <span>{{ $toursite->description ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.toursites.inputs.accomodation')</h5>
                    <span>{{ $toursite->accomodation ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.toursites.inputs.region')</h5>
                    <span>{{ $toursite->region ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.toursites.inputs.district')</h5>
                    <span>{{ $toursite->district ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.toursites.inputs.distance')</h5>
                    <span>{{ $toursite->distance ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.toursites.inputs.attractions')</h5>
                    <span>{{ $toursite->attractions ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.toursites.inputs.local_price')</h5>
                    <span>{{ $toursite->local_price ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.toursites.inputs.international_price')</h5>
                    <span>{{ $toursite->international_price ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.toursites.inputs.time_of_visit')</h5>
                    <span>{{ $toursite->time_of_visit ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('toursites.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Toursite::class)
                <a href="{{ route('toursites.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
