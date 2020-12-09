<form {{ $attributes->merge(['class' => 'search-form']) }} action="{{ route($route.'.search') }}" method="post">

    @csrf

    <div class="input-group">

      <input type="text" name="search[text]" class="form-control" placeholder="@lang('sp::action.search')" aria-label="@lang('sp::action.search')" value="{{ $search ? $search->attribute('text') : '' }}">

      @if($isAdvanced)
        <button class="btn btn-outline-secondary {{ !$isAdvancedOpen() ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $collapseFilterId }}" aria-expanded="false"  aria-label="@lang('sp::action.collapse')" aria-controls="{{ $collapseFilterId }}" title="@lang('sp::action.filter')"><i class="icon-filter"></i></button>
      @endif

      @if($isSortable)
        <button class="btn btn-outline-secondary {{ !$isSortableOpen() ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $collapseSortId }}" aria-expanded="false"  aria-label="@lang('sp::action.collapse')" aria-controls="{{ $collapseSortId }}" title="@lang('sp::action.sort')"><i class="icon-list"></i></button>
      @endif

      <button class="btn btn-outline-primary" type="submit" title="@lang('sp::action.search')"><i class="icon-search"></i> @lang('sp::action.search')</button>

      @if(!is_null($search))
        <a href="{{ route('searchable.reset', ['key' => $key]) }}" class="btn btn-outline-secondary"><i class="icon-cross"></i> @lang('sp::action.reset')</a>
      @endif

    </div>

    @if($isAdvanced)
      <div class="collapse collapse-search {{ $isAdvancedOpen() ? 'show' : '' }}" id="{{ $collapseFilterId }}">
        <div class="collapse-search-body">

          @if($hasSoftDelete())
            <x-bs-check class="form-switch" label="With trashed" type="checkbox" name="search[withTrashed]" boolean :checked="$search ? $search->attribute('withTrashed') : false" />
          @endif

          {!! $slot !!}

          @includeIf($folder.'.includes.advanced-search')

        </div>
      </div>
    @endif

    @if($isSortable)
      <div class="collapse collapse-search {{ $isSortableOpen() ? 'show' : '' }}" id="{{ $collapseSortId }}">
        <div class="collapse-search-body">


            <div class="input-group">

                <span class="input-group-text">@lang('action.sort-by')</span>

                <select class="form-select" name="search[sort][field]">
                  @foreach ($sortableFields as $key => $sortableField)
                      <option value="{{ $key }}" {{ $search && $search->attribute('sort')['field'] == $key ? 'selected' : '' }} >{{ $sortableField }}</option>
                  @endforeach
                </select>

                <select class="form-select" name="search[sort][direction]">
                  <option value="asc" {{ $search && $search->attribute('sort')['direction'] == 'asc' ? 'selected' : '' }}>@lang('sp::field.ascending')</option>
                  <option value="desc" {{ $search && $search->attribute('sort')['direction'] == 'desc' ? 'selected' : '' }}>@lang('sp::field.descending')</option>
                </select>


            </div>



        </div>
      </div>
    @endif

</form>
