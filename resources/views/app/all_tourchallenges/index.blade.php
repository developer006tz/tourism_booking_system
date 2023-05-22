@extends('layouts.app')

@section('content')
<div class="content container-fluid">
    <div class="searchbar mb-4">
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
                @can('create', App\Models\Tourchallenges::class)
                <a
                    href="{{ route('all-tourchallenges.create') }}"
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
                    @lang('crud.all_tourchallenges.index_title')
                </h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.all_tourchallenges.inputs.user_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_tourchallenges.inputs.title')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_tourchallenges.inputs.description')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_tourchallenges.inputs.image')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($allTourchallenges as $tourchallenges)
                        <tr>
                            <td>
                                {{ optional($tourchallenges->user)->name ?? '-'
                                }}
                            </td>
                            <td>{{ $tourchallenges->title ?? '-' }}</td>
                            <td>{{ $tourchallenges->description ?? '-' }}</td>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $tourchallenges->image ? url(\Storage::url($tourchallenges->image)) : '' }}"
                                />
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $tourchallenges)
                                    <a
                                        href="{{ route('all-tourchallenges.edit', $tourchallenges) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $tourchallenges)
                                    <a
                                        href="{{ route('all-tourchallenges.show', $tourchallenges) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $tourchallenges)
                                    <form
                                        action="{{ route('all-tourchallenges.destroy', $tourchallenges) }}"
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
                                {!! $allTourchallenges->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
