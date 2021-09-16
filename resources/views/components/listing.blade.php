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
            <table class="table @if($withChildren) table-tree @endif">

                <thead>
                    <tr>

                        @if($isSortable())
                            <th class="td-fit"></th>
                        @endif

                        @if($withChildren)
                          <th></th>
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

                        @if($showDates('created'))
                          <th class="td-fit d-none d-lg-table-cell">@lang('sp::field.created-at')</th>
                        @endif

                        @if($showDates('updated'))
                          <th class="td-fit d-none d-lg-table-cell">@lang('sp::field.updated-at')</th>
                        @endif

                        @if($showDates('deleted') && $hasSoftDelete())
                          <th class="td-fit d-none d-lg-table-cell">@lang('sp::field.deleted-at')</th>
                        @endif

                        <th class="td-fit">@lang('sp::field.actions')</th>

                    </tr>
                </thead>

                <tbody @if($isSortable()) class="sortable" data-sortable-model="{{ $model }}" data-sortable-order="{{ $sortableOrder }}" @endif >
                    @foreach ($items as $item)
                      @include('sp::includes.listing.item')
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
