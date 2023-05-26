@extends('layouts.app')

@section('content')
<div class="content container-fluid">
    <div class="searchbar mb-4">
        <div class="row">
             @include('components.search')
            <div class="col-md-6 text-right">
                @can('create', App\Models\Attractions::class)
                <a
                    href="{{ route('all-attractions.create') }}"
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
                    @lang('crud.all_attractions.index_title')
                </h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.all_attractions.inputs.toursite_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_attractions.inputs.name')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_attractions.inputs.description')
                            </th>
                            <th class="text-right">
                                @lang('crud.all_attractions.inputs.distance')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($allAttractions as $attractions)
                        <tr>
                            <td>
                                {{ optional($attractions->toursite)->name ?? '-'
                                }}
                            </td>
                            <td>{{ $attractions->name ?? '-' }}</td>
                            <td>{{ $attractions->description ?? '-' }}</td>
                            <td>{{ $attractions->distance ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $attractions)
                                    <a
                                        href="{{ route('all-attractions.edit', $attractions) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $attractions)
                                    <a
                                        href="{{ route('all-attractions.show', $attractions) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $attractions)
                                    <form
                                        action="{{ route('all-attractions.destroy', $attractions) }}"
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
                            <td colspan="5">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">
                                {!! $allAttractions->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
