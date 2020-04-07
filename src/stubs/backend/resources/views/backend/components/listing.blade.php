<div class="listing">

    <div class="listing-header d-flex justify-content-between">

        <h2>
          {{ $title }}
          @if($isSoftDeleting)
            <small>
              <a class="{{ Route::is($route.'.index') ? 'active' : '' }}" href="{{ route($route.'.index') }}">@lang('backend.listing.all', ['nbr' => $total['all']])</a>
              |
              <a class="{{ Route::is($route.'.trashed') ? 'active' : '' }}" href="{{ route($route.'.trashed') }}">@lang('backend.listing.trash', ['nbr' => $total['trash']])</a>
            </small>
          @endif
        </h2>

        <div>

            @if(Route::has($route.'.export') && Auth::user()->can('export', $model))
                <a href="{{ route($route.'.export') }}" class="btn btn-outline-secondary rounded-pill btn-sm"><i class="icon icon-download"></i> @lang('backend.action.export')</a>
            @endif

            @if(Route::has($route.'.create') && Auth::user()->can('create', $model))
                <a href="{{ route($route.'.create') }}" class="btn btn-brand rounded-pill btn-sm"><i class="icon icon-plus"></i> @lang('backend.action.add')</a>
            @endif

        </div>

    </div>

    <div class="listing-body">

        @if($items->count())

            <table class="table">

                <thead>
                    <tr>

                        @if($showId)
                            <th class="td-fit">#</th>
                        @endif

                        @foreach ($header as $value)
                            <th>@lang('backend.field.'.$value)</th>
                        @endforeach

                        @if($showDates)
                            <th class="td-fit">@lang('backend.field.created-at')</th>
                            <th class="td-fit">@lang('backend.field.updated-at')</th>
                        @endif

                        <th class="td-fit">@lang('backend.field.actions')</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            @if($showId)
                                <td class="td-fit">{{ $item->id }}</td>
                            @endif

                            @includeFirst([$viewFolder.'.listing.detail', 'backend.components.listing-detail'])

                            @if($showDates)
                                <td class="td-fit">{{ $item->created_at }}</td>
                                <td class="td-fit">{{ $item->updated_at }}</td>
                            @endif

                            <td class="td-fit">

                                @if(Route::has($route.'.show') && Auth::user()->can('view', $item))
                                    <a href="{{ route($route.'.show', $item->id) }}" class="btn btn-gray btn-sm rounded-circle" aria-label="@lang('backend.action.preview')"><i class="icon icon-preview"></i></a>
                                @endif

                                @if(Route::has($route.'.edit') && Auth::user()->can('update', $item))
                                    <a href="{{ route($route.'.edit', $item->id) }}" class="btn btn-gray btn-sm rounded-circle" aria-label="@lang('backend.action.edit')"><i class="icon icon-pencil"></i></a>
                                @endif

                                @if(Route::has($route.'.destroy') && Auth::user()->can('delete', $item))
                                    <button type="button" data-toggle="modal" data-action="{{ route($route.'.destroy', $item->id) }}" data-target="#deleteConfirm" class="btn btn-gray btn-sm rounded-circle" aria-label="@lang('backend.action.delete')"><i class="icon icon-trash"></i></button>
                                @endif

                                @if(Route::has($route.'.restore') && Auth::user()->can('restore', $item))
                                    <button type="button" data-toggle="modal" data-action="{{ route($route.'.restore', $item->id) }}" data-target="#restoreConfirm" class="btn btn-gray btn-sm rounded-circle" aria-label="@lang('backend.action.restore')"><i class="icon icon-time-reverse"></i></button>
                                @endif

                                @if(Route::has($route.'.forceDelete') && Auth::user()->can('forceDelete', $item))
                                    <button type="button" data-toggle="modal" data-action="{{ route($route.'.forceDelete', $item->id) }}" data-target="#forceDeleteConfirm" class="btn btn-gray btn-sm rounded-circle" aria-label="@lang('backend.action.force-delete')"><i class="icon icon-trash"></i></button>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        @else
            <div class="alert alert-info m-3">@lang('backend.listing.no-result')</div>
        @endif

    </div>

    @if($hasPagination)
        <div class="listing-footer d-flex align-items-center">
            {{ $items->links('backend.components.pagination') }}
            <span class="listing-total ml-auto">@lang('backend.listing.total') {{$items->count().'/'.$items->total()}}</span>
        </div>
    @endif

</div>
