@extends('layouts.app')

@section('content')
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
                <form>
                    <div class="input-group">
                        <input
                            id="indexSearch"
                            type="text"
                            name="search"
                            placeholder="{{ __('crud.common.search') }}"
                            value="{{ $search ?? '' }}"
                            class="form-control"
                            autocomplete="off"
                        />
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                                <i class="icon ion-md-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\Tourguideagent::class)
                <a
                    href="{{ route('tourguideagents.create') }}"
                    class="btn btn-primary"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.tourguideagents.index_title')
                </h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.tourguideagents.inputs.toursite_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.tourguideagents.inputs.title')
                            </th>
                            <th class="text-left">
                                @lang('crud.tourguideagents.inputs.description')
                            </th>
                            <th class="text-right">
                                @lang('crud.tourguideagents.inputs.guide_price_per_day')
                            </th>
                            <th class="text-right">
                                @lang('crud.tourguideagents.inputs.rating')
                            </th>
                            <th class="text-right">
                                @lang('crud.tourguideagents.inputs.distance_covered')
                            </th>
                            <th class="text-left">
                                @lang('crud.tourguideagents.inputs.user_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tourguideagents as $tourguideagent)
                        <tr>
                            <td>
                                {{ optional($tourguideagent->toursite)->name ??
                                '-' }}
                            </td>
                            <td>{{ $tourguideagent->title ?? '-' }}</td>
                            <td>{{ $tourguideagent->description ?? '-' }}</td>
                            <td>
                                {{ $tourguideagent->guide_price_per_day ?? '-'
                                }}
                            </td>
                            <td>{{ $tourguideagent->rating ?? '-' }}</td>
                            <td>
                                {{ $tourguideagent->distance_covered ?? '-' }}
                            </td>
                            <td>
                                {{ optional($tourguideagent->user)->name ?? '-'
                                }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $tourguideagent)
                                    <a
                                        href="{{ route('tourguideagents.edit', $tourguideagent) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $tourguideagent)
                                    <a
                                        href="{{ route('tourguideagents.show', $tourguideagent) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $tourguideagent)
                                    <form
                                        action="{{ route('tourguideagents.destroy', $tourguideagent) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="8">
                                {!! $tourguideagents->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
