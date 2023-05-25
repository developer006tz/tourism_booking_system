@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('bookings.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.bookings.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.bookings.inputs.user_id')</h5>
                    <span>{{ optional($booking->user)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.bookings.inputs.toursite_id')</h5>
                    <span>{{ optional($booking->toursite)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.bookings.inputs.transportation_id')</h5>
                    <span
                        >{{ optional($booking->transportation)->image ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.bookings.inputs.accomodations_id')</h5>
                    <span
                        >{{ optional($booking->accomodations)->name ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('bookings.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Booking::class)
                <a href="{{ route('bookings.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
