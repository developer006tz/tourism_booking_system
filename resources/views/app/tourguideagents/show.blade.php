@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('tourguideagents.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.tourguideagents.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.tourguideagents.inputs.toursite_id')</h5>
                    <span
                        >{{ optional($tourguideagent->toursite)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.tourguideagents.inputs.title')</h5>
                    <span>{{ $tourguideagent->title ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.tourguideagents.inputs.description')</h5>
                    <span>{{ $tourguideagent->description ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.tourguideagents.inputs.guide_price_per_day')
                    </h5>
                    <span
                        >{{ $tourguideagent->guide_price_per_day ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.tourguideagents.inputs.rating')</h5>
                    <span>{{ $tourguideagent->rating ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.tourguideagents.inputs.distance_covered')
                    </h5>
                    <span>{{ $tourguideagent->distance_covered ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.tourguideagents.inputs.user_id')</h5>
                    <span
                        >{{ optional($tourguideagent->user)->name ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('tourguideagents.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Tourguideagent::class)
                <a
                    href="{{ route('tourguideagents.create') }}"
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
