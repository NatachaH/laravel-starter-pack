<div class="listing">

    <div class="listing-header d-flex justify-content-between">

        <h2>{{ $title }}</h2>

        <div>

            @if(Route::has($route.'.export') && Auth::user()->can('export', $model))
                <a href="{{ route($route.'.export') }}" class="btn btn-outline-secondary rounded-pill"><i class="icon icon-download"></i> @lang('backend.export')</a>
            @endif

            @if(Route::has($route.'.create') && Auth::user()->can('create', $model))
                <a href="{{ route($route.'.create') }}" class="btn btn-brand rounded-pill"><i class="icon icon-plus"></i> @lang('backend.add')</a>
            @endif

        </div>

    </div>

    <div class="listing-body">

        @if($items->count())

            <table class="table">

                <thead>
                    <tr>

                        @if($showId)
                            <th class="td-fit">#ID</th>
                        @endif

                        @foreach ($header as $value)
                            <th>{{ $value }}</th>
                        @endforeach

                        @if($showDates)
                            <th class="td-fit">@lang('backend.created-at')</th>
                            <th class="td-fit">@lang('backend.updated-at')</th>
                        @endif

                        <th class="td-fit">@choice('backend.action',2)</th>

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
                                    <a href="{{ route($route.'.show', $item->id) }}" class="btn btn-default btn-sm rounded-circle" aria-label="@lang('backend.preview')"><i class="icon icon-preview"></i></a>
                                @endif

                                @if(Route::has($route.'.edit') && Auth::user()->can('update', $item))
                                    <a href="{{ route($route.'.edit', $item->id) }}" class="btn btn-default btn-sm rounded-circle" aria-label="@lang('backend.edit')"><i class="icon icon-pencil"></i></a>
                                @endif

                                @if(Route::has($route.'.destroy') && Auth::user()->can('delete', $item))
                                    <a href="{{ route($route.'.destroy', $item->id) }}" class="btn btn-default btn-sm rounded-circle" aria-label="@lang('backend.delete')"><i class="icon icon-trash"></i></a>
                                @endif

                                @if(Route::has($route.'.restore') && Auth::user()->can('restore', $item))
                                    <a href="{{ route($route.'.restore', $item->id) }}" class="btn btn-default btn-sm rounded-circle" aria-label="@lang('backend.restore')"><i class="icon icon-time-reverse"></i></a>
                                @endif

                                @if(Route::has($route.'.forceDelete') && Auth::user()->can('forceDelete', $item))
                                    <a href="{{ route($route.'.forceDelete', $item->id) }}" class="btn btn-default btn-sm rounded-circle" aria-label="@lang('backend.force-delete')"><i class="icon icon-trash" alt="@lang('backend.force-delete')"></i></a>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        @else
            <div class="alert alert-info m-3">@lang('backend.no-result')</div>
        @endif

    </div>

    @if($hasPagination)
        <div class="listing-footer d-flex justify-content-between">
            {{ $items->links('backend.component.pagination') }}
            <span class="listing-total">@lang('backend.total') {{$items->count().'/'.$items->total()}}</span>
        </div>
    @endif

</div>
