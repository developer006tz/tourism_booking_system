@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('all-tourchallenges.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.all_tourchallenges.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.all_tourchallenges.inputs.user_id')</h5>
                    <span
                        >{{ optional($tourchallenges->user)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_tourchallenges.inputs.title')</h5>
                    <span>{{ $tourchallenges->title ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_tourchallenges.inputs.description')</h5>
                    <span>{{ $tourchallenges->description ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_tourchallenges.inputs.image')</h5>
                    <x-partials.thumbnail
                        src="{{ $tourchallenges->image ? url(\Storage::url($tourchallenges->image)) : '' }}"
                        size="150"
                    />
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('all-tourchallenges.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Tourchallenges::class)
                <a
                    href="{{ route('all-tourchallenges.create') }}"
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
