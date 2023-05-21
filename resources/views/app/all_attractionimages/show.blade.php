@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('all-attractionimages.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.all_attractionimages.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>
                        @lang('crud.all_attractionimages.inputs.attractions_id')
                    </h5>
                    <span
                        >{{ optional($attractionimages->attractions)->name ??
                        '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_attractionimages.inputs.image')</h5>
                    <x-partials.thumbnail
                        src="{{ $attractionimages->image ? url(\Storage::url($attractionimages->image)) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.all_attractionimages.inputs.description')
                    </h5>
                    <span>{{ $attractionimages->description ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('all-attractionimages.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Attractionimages::class)
                <a
                    href="{{ route('all-attractionimages.create') }}"
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
