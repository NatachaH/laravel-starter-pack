<form {{ $attributes->merge(['class' => 'search-form']) }} action="{{ route($route.'.search') }}" method="post">

    @csrf

    <div class="input-group">

      <input type="text" name="search[text]" class="form-control" placeholder="@lang('sp::action.search')" aria-label="@lang('sp::action.search')" value="{{ $search ? $search->attribute('text') : '' }}">

      @if(!is_null($search))
        <a href="{{ route('searchable.reset', ['key' => $key]) }}" class="btn btn-outline-secondary" aria-label="@lang('sp::action.reset')" title="@lang('sp::action.reset')"><i class="icon-cross"></i></a>
      @endif

      <button class="btn btn-outline-primary" type="submit" title="@lang('sp::action.search')"><i class="icon-search"></i> @lang('sp::action.search')</button>

      @if($isAdvanced)
        <button class="btn btn-outline-secondary {{ !$isAdvancedOpen() ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $collapseId }}" aria-expanded="false"  aria-label="@lang('sp::action.collapse')" aria-controls="{{ $collapseId }}" title="@lang('sp::action.filter')"><i class="icon-filter"></i></button>
      @endif

    </div>

    @if($isAdvanced)
      <div class="collapse collapse-search {{ $isAdvancedOpen() ? 'show' : '' }}" id="{{ $collapseId }}">
        <div class="collapse-search-body">

          <h1>@lang('sp::field.advanced-search')</h1>

          <div class="row row-cols-3">

            {!! $slot !!}

            @includeIf($folder.'.includes.advanced-search')

            @if($isSortable)

              <div class="col">
                <x-bs-select  name="search[sort][field]" :options="$sortableFields" :selected="$search ? $search->attribute('sort')['field'] ?? [] : []" :before="__('sp::action.sort-by')" >
                  <x-slot name="after">
                    <input type="radio" class="btn-check" name="search[sort][direction]" id="sortAsc" value="asc" {{ $sortableOrder == 'asc' || $search && $search->attribute('sort') && $search->attribute('sort')['direction'] == 'asc' ? 'checked' : '' }} autocomplete="off">
                    <label class="btn btn-outline-border" for="sortAsc" aria-label="@lang('sp::field.ascending')" title="@lang('sp::field.ascending')"><i class="icon-sort-alpha-asc"></i></label>
                    <input type="radio" class="btn-check" name="search[sort][direction]" id="sortDesc" value="desc" {{ $sortableOrder == 'desc' || $search && $search->attribute('sort') && $search->attribute('sort')['direction'] == 'desc' ? 'checked' : '' }} autocomplete="off">
                    <label class="btn btn-outline-border" for="sortDesc" aria-label="@lang('sp::field.descending')" title="@lang('sp::field.descending')"><i class="icon-sort-alpha-desc"></i></label>
                  </x-slot>
                </x-bs-select>
              </div>

            @endif

          </div>

        </div>

        <div class="collapse-search-footer">

            @if($hasSoftDelete())
              <x-bs-check class="form-switch me-auto" :label="__('sp::field.with-trashed')" type="checkbox" name="search[withTrashed]" boolean :checked="$search ? $search->attribute('withTrashed') : false" />
            @endif

            @if(!is_null($search))
              <a href="{{ route('searchable.reset', ['key' => $key]) }}" class="btn btn-outline-secondary me-3" aria-label="@lang('sp::action.reset')" title="@lang('sp::action.reset')"><i class="icon-cross"></i> @lang('sp::action.reset')</a>
            @endif

            <button class="btn btn-primary" type="submit" aria-label="@lang('sp::action.search')" title="@lang('sp::action.search')"><i class="icon-search"></i> @lang('sp::action.search')</button>

        </div>

      </div>
    @endif


</form>
