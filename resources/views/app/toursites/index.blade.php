@extends('layouts.app')

@section('content')
<div class="content container-fluid">
    <div class="searchbar mb-4">
        <div class="row">
             @include('components.search')
            <div class="col-md-6 text-right">
                @can('create', App\Models\Toursite::class)
                <a
                    href="{{ route('toursites.create') }}"
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
                <h4 class="card-title">@lang('crud.toursites.index_title')</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.toursites.inputs.name')
                            </th>
                            <th class="text-left">
                                @lang('crud.toursites.inputs.country_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.toursites.inputs.other_name')
                            </th>
                            <th class="text-left">
                                @lang('crud.toursites.inputs.description')
                            </th>
                            <th class="text-left">
                                @lang('crud.toursites.inputs.accomodation')
                            </th>
                            <th class="text-left">
                                @lang('crud.toursites.inputs.region')
                            </th>
                            <th class="text-left">
                                @lang('crud.toursites.inputs.district')
                            </th>
                            <th class="text-right">
                                @lang('crud.toursites.inputs.distance')
                            </th>
                            <th class="text-left">
                                @lang('crud.toursites.inputs.attractions')
                            </th>
                            <th class="text-right">
                                @lang('crud.toursites.inputs.local_price')
                            </th>
                            <th class="text-right">
                                @lang('crud.toursites.inputs.international_price')
                            </th>
                            <th class="text-left">
                                @lang('crud.toursites.inputs.time_of_visit')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($toursites as $toursite)
                        <tr>
                            <td>{{ $toursite->name ?? '-' }}</td>
                            <td>
                                {{ optional($toursite->country)->name ?? '-' }}
                            </td>
                            <td>{{ $toursite->other_name ?? '-' }}</td>
                            <td>{{ $toursite->description ?? '-' }}</td>
                            <td>{{ $toursite->accomodation ?? '-' }}</td>
                            <td>{{ $toursite->region ?? '-' }}</td>
                            <td>{{ $toursite->district ?? '-' }}</td>
                            <td>{{ $toursite->distance ?? '-' }}</td>
                            <td>{{ $toursite->attractions ?? '-' }}</td>
                            <td>{{ $toursite->local_price ?? '-' }}</td>
                            <td>{{ $toursite->international_price ?? '-' }}</td>
                            <td>{{ $toursite->time_of_visit ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $toursite)
                                    <a
                                        href="{{ route('toursites.edit', $toursite) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $toursite)
                                    <a
                                        href="{{ route('toursites.show', $toursite) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $toursite)
                                    <form
                                        action="{{ route('toursites.destroy', $toursite) }}"
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
                            <td colspan="13">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="13">{!! $toursites->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
