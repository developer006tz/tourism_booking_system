@extends('layouts.app')

@section('content')
<div class="content container-fluid">
    <div class="searchbar mb-4">
        <div class="row">
             @include('components.search')
            <div class="col-md-6 text-right">
                @can('create', App\Models\Accomodations::class)
                <a
                    href="{{ route('all-accomodations.create') }}"
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
                    @lang('crud.all_accomodations.index_title')
                </h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.all_accomodations.inputs.toursite_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_accomodations.inputs.name')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_accomodations.inputs.type')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_accomodations.inputs.sleep_service')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_accomodations.inputs.description')
                            </th>
                            <th class="text-right">
                                @lang('crud.all_accomodations.inputs.local_night_fee')
                            </th>
                            <th class="text-right">
                                @lang('crud.all_accomodations.inputs.international_night_fee')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_accomodations.inputs.food_service')
                            </th>
                            <th class="text-left px-6 py-3"  scope="col">
                                @lang('crud.all_accomodations.inputs.food_types_and_price')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_accomodations.inputs.is_inside_park')
                            </th>
                            <th class="text-right">
                                @lang('crud.all_accomodations.inputs.distance_to_tour_site')
                            </th>
                            <th class="text-right">
                                @lang('crud.all_accomodations.inputs.room_available')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($allAccomodations as $accomodations)
                        <tr>
                            <td>
                                {{ optional($accomodations->toursite)->name ??
                                '-' }}
                            </td>
                            <td>{{ $accomodations->name ?? '-' }}</td>
                            <td>{{ $accomodations->type ?? '-' }}</td>
                            <td>{{ $accomodations->sleep_service ?? '-' }}</td>
                            <td>{{ $accomodations->description ?? '-' }}</td>
                            <td>
                                {{ $accomodations->local_night_fee ?? '-' }}
                            </td>
                            <td>
                                {{ $accomodations->international_night_fee ??
                                '-' }}
                            </td>
                            <td>{{ $accomodations->food_service ?? '-' }}</td>
                            <td  scope="col" class="px-6 py-3">
                                {{ $accomodations->food_types_and_price ?? '-'
                                }}
                            </td>
                            <td>{{ $accomodations->is_inside_park ?? '-' }}</td>
                            <td>
                                {{ $accomodations->distance_to_tour_site ?? '-'
                                }}
                            </td>
                            <td>{{ $accomodations->room_available ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $accomodations)
                                    <a
                                        href="{{ route('all-accomodations.edit', $accomodations) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $accomodations)
                                    <a
                                        href="{{ route('all-accomodations.show', $accomodations) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $accomodations)
                                    <form
                                        action="{{ route('all-accomodations.destroy', $accomodations) }}"
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
                            <td colspan="13">
                                {!! $allAccomodations->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
