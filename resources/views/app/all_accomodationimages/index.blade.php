@extends('layouts.app')

@section('content')
<div class="content container-fluid">
    <div class="searchbar mb-4">
        <div class="row">
            @include('components.search')
            <div class="col-md-6 text-right">
                @can('create', App\Models\Accomodationimages::class)
                <a
                    href="{{ route('all-accomodationimages.create') }}"
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
                    @lang('crud.all_accomodationimages.index_title')
                </h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.all_accomodationimages.inputs.accomodations_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_accomodationimages.inputs.type')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_accomodationimages.inputs.image')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_accomodationimages.inputs.description')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($allAccomodationimages as $accomodationimages)
                        <tr>
                            <td>
                                {{
                                optional($accomodationimages->accomodations)->name
                                ?? '-' }}
                            </td>
                            <td>{{ $accomodationimages->type ?? '-' }}</td>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $accomodationimages->image ? url(\Storage::url($accomodationimages->image)) : '' }}"
                                />
                            </td>
                            <td>
                                {{ $accomodationimages->description ?? '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $accomodationimages)
                                    <a
                                        href="{{ route('all-accomodationimages.edit', $accomodationimages) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $accomodationimages)
                                    <a
                                        href="{{ route('all-accomodationimages.show', $accomodationimages) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $accomodationimages)
                                    <form
                                        action="{{ route('all-accomodationimages.destroy', $accomodationimages) }}"
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
                                {!! $allAccomodationimages->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
