@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a
                    href="{{ route('all-accomodationimages.index') }}"
                    class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.all_accomodationimages.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>
                        @lang('crud.all_accomodationimages.inputs.accomodations_id')
                    </h5>
                    <span
                        >{{ optional($accomodationimages->accomodations)->name
                        ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_accomodationimages.inputs.type')</h5>
                    <span>{{ $accomodationimages->type ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_accomodationimages.inputs.image')</h5>
                    <x-partials.thumbnail
                        src="{{ $accomodationimages->image ? url(\Storage::url($accomodationimages->image)) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.all_accomodationimages.inputs.description')
                    </h5>
                    <span>{{ $accomodationimages->description ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('all-accomodationimages.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Accomodationimages::class)
                <a
                    href="{{ route('all-accomodationimages.create') }}"
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
