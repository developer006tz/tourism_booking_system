@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('all-accomodations.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.all_accomodations.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.all_accomodations.inputs.toursite_id')</h5>
                    <span
                        >{{ optional($accomodations->toursite)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_accomodations.inputs.name')</h5>
                    <span>{{ $accomodations->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_accomodations.inputs.type')</h5>
                    <span>{{ $accomodations->type ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.all_accomodations.inputs.sleep_service')
                    </h5>
                    <span>{{ $accomodations->sleep_service ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_accomodations.inputs.description')</h5>
                    <span>{{ $accomodations->description ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.all_accomodations.inputs.local_night_fee')
                    </h5>
                    <span>{{ $accomodations->local_night_fee ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.all_accomodations.inputs.international_night_fee')
                    </h5>
                    <span
                        >{{ $accomodations->international_night_fee ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_accomodations.inputs.food_service')</h5>
                    <span>{{ $accomodations->food_service ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.all_accomodations.inputs.food_types_and_price')
                    </h5>
                    <span
                        >{{ $accomodations->food_types_and_price ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.all_accomodations.inputs.is_inside_park')
                    </h5>
                    <span>{{ $accomodations->is_inside_park ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.all_accomodations.inputs.distance_to_tour_site')
                    </h5>
                    <span
                        >{{ $accomodations->distance_to_tour_site ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.all_accomodations.inputs.room_available')
                    </h5>
                    <span>{{ $accomodations->room_available ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('all-accomodations.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Accomodations::class)
                <a
                    href="{{ route('all-accomodations.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
