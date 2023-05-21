@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('all-transportation.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.all_transportation.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.all_transportation.inputs.toursite_id')</h5>
                    <span
                        >{{ optional($transportation->toursite)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_transportation.inputs.type')</h5>
                    <span>{{ $transportation->type ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_transportation.inputs.price')</h5>
                    <span>{{ $transportation->price ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.all_transportation.inputs.distance_covered_in_km')
                    </h5>
                    <span
                        >{{ $transportation->distance_covered_in_km ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_transportation.inputs.image')</h5>
                    <x-partials.thumbnail
                        src="{{ $transportation->image ? url(\Storage::url($transportation->image)) : '' }}"
                        size="150"
                    />
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('all-transportation.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Transportation::class)
                <a
                    href="{{ route('all-transportation.create') }}"
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
