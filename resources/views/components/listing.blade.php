<div {{ $attributes->merge(['class' => 'listing']) }}>

    {!! $slot !!}

    <div class="listing-header d-sm-flex justify-content-between">

        <div class="listing-filter">
          @if($isSearch())
            <a class="active" href="#">@lang('sp::listing.result', ['nbr' => $items->total()])</a>
          @else
            <a class="{{ Route::is($route.'.index') ? 'active' : '' }}" href="{{ route($route.'.index') }}">@lang('sp::listing.all', ['nbr' => $total['all']])</a>
            @if($hasSoftDelete())
                | <a class="{{ Route::is($route.'.trashed') ? 'active' : '' }}" href="{{ route($route.'.trashed') }}">@lang('sp::listing.trash', ['nbr' => $total['trash']])</a>
            @endif
          @endif
        </div>

        <div class="listing-action mt-3 mt-sm-0">

            @isset($buttons)
              {!! $buttons !!}
            @endisset

            @if(!$isSearch() && Route::has($route.'.import') && Auth::user()->can('import', $model))
                <a href="{{ route($route.'.import') }}" class="btn btn-outline-secondary rounded-pill"><i class="icon icon-upload"></i> @lang('sp::action.import')</a>
            @endif

            @if(!$isSearch() && Route::has($route.'.export') && Auth::user()->can('export', $model))
                <a href="{{ route($route.'.export') }}" class="btn btn-outline-secondary rounded-pill"><i class="icon icon-download"></i> @lang('sp::action.export')</a>
            @endif

            @if(Route::has($route.'.create') && Auth::user()->can('create', $model))
                <a href="{{ route($route.'.create') }}" class="btn btn-primary rounded-pill"><i class="icon icon-plus"></i> @lang('sp::action.add')</a>
            @endif

        </div>

    </div>

    <div class="listing-body">

        @if($items->count())

          <div class="table-responsive">
            <table class="table">

                <thead>
                    <tr>

                        @if($isSortable())
                            <th class="td-fit"></th>
                        @endif

                        @if($showId)
                            <th class="td-fit">#</th>
                        @endif

                        @foreach ($header as $value)
                            <th>
                              @if(\Lang::has('sp::field.'.$value))
                                @lang('sp::field.'.$value)
                              @elseif(\Lang::has('backend.model.'.$value))
                                @choice('backend.model.'.$value,1)
                              @else
                                @lang('backend.field.'.$value)
                              @endif
                            </th>
                        @endforeach

                        @if($showDates)
                          <th class="td-fit d-none d-lg-table-cell">@lang('sp::field.created-at')</th>
                          <th class="td-fit d-none d-lg-table-cell">@lang('sp::field.updated-at')</th>
                          @if($showDeletedDates())
                            <th class="td-fit d-none d-lg-table-cell">@lang('sp::field.deleted-at')</th>
                          @endif
                        @endif

                        <th class="td-fit">@lang('sp::field.actions')</th>

                    </tr>
                </thead>

                <tbody @if($isSortable()) class="sortable" data-sortable-model="{{ $model }}" data-sortable-order="{{ $sortableOrder }}" @endif >
                    @foreach ($items as $item)
                        <tr data-id="{{ $item->id }}">

                            @if($isSortable())
                                <td class="td-fit"><i class="icon-move drag"></i></td>
                            @endif

                            @if($showId)
                                <td class="td-fit">{{ $item->id }}</td>
                            @endif

                            @includeFirst([$folder.'.includes.listing-detail', 'sp::includes.listing-detail'])

                            @if($showDates)
                                <td class="td-fit d-none d-lg-table-cell">{{ $item->created_at->format('d.m.Y H:i') }}</td>
                                <td class="td-fit d-none d-lg-table-cell">{{ $item->updated_at->format('d.m.Y H:i') }}</td>
                                @if($showDeletedDates())
                                  <td class="td-fit d-none d-lg-table-cell">{{ empty($item->deleted_at) ? '-' : $item->deleted_at->format('d.m.Y H:i') }}</td>
                                @endif
                            @endif

                            <td class="td-fit">

                                @includeIf($folder.'.includes.listing-button')

                                @if(Route::has($route.'.show') && Auth::user()->can('view', $item))
                                    <a href="{{ route($route.'.show', $item->id) }}" class="btn btn-gray rounded-circle" aria-label="@lang('sp::action.preview')"><i class="icon icon-preview"></i></a>
                                @endif

                                @if(Route::has($route.'.edit') && Auth::user()->can('update', $item))
                                    <a href="{{ route($route.'.edit', $item->id) }}" class="btn btn-gray rounded-circle" aria-label="@lang('sp::action.edit')"><i class="icon icon-pencil"></i></a>
                                @endif

                                @if(Route::has($route.'.destroy') && Auth::user()->can('delete', $item))
                                    <button type="button" data-bs-toggle="modal" data-action="{{ route($route.'.destroy', $item->id) }}" data-bs-target="#{{ Route::has($route.'.forceDelete') ? 'softDeleteConfirm' : 'deleteConfirm' }}" class="btn btn-gray rounded-circle" aria-label="@lang('sp::action.delete')"><i class="icon icon-trash"></i></button>
                                @endif

                                @if(Route::has($route.'.restore') && Auth::user()->can('restore', $item))
                                    <button type="button" data-bs-toggle="modal" data-action="{{ route($route.'.restore', $item->id) }}" data-bs-target="#restoreConfirm" class="btn btn-gray rounded-circle" aria-label="@lang('sp::action.restore')"><i class="icon icon-time-reverse"></i></button>
                                @endif

                                @if(Route::has($route.'.forceDelete') && Auth::user()->can('forceDelete', $item))
                                    <button type="button" data-bs-toggle="modal" data-action="{{ route($route.'.forceDelete', $item->id) }}" data-bs-target="#deleteConfirm" class="btn btn-gray rounded-circle" aria-label="@lang('sp::action.force-delete')"><i class="icon icon-trash"></i></button>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
          </div>

        @else
          <x-bs-alert class="m-3" color="info">
            @lang('sp::listing.no-result')
          </x-bs-alert>
        @endif

    </div>

    @if($hasPagination())
        <div class="listing-footer d-flex align-items-center">
            {{ $items->links('sp::includes.pagination') }}
            <span class="listing-total ms-auto">@lang('sp::listing.total') {{$items->count().'/'.$items->total()}}</span>
        </div>
    @endif

</div>
