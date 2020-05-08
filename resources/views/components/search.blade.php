<form {{ $attributes->merge(['class' => 'search-form']) }} action="{{ route($route.'.search') }}" method="post">

    @csrf

    <div class="input-group">

      <input type="text" name="search[text]" class="form-control" placeholder="@lang('sp::action.search')" aria-label="@lang('sp::action.search')" value="{{ $search ? $search->attribute('text') : '' }}">

      @if($isAdvanced)
        <button class="btn btn-outline-secondary" type="button" data-toggle="collapse" data-target="#{{ $collapseId }}" aria-expanded="false"  aria-label="@lang('sp::action.collapse')" aria-controls="{{ $collapseId }}"><i class="icon-toggles"></i></button>
      @endif

      <button class="btn btn-outline-primary" type="submit"><i class="icon-search"></i> @lang('sp::action.search')</button>

      @if(!is_null($search))
        <a href="{{ route('searchable.reset', ['key' => $key]) }}" class="btn btn-outline-secondary"><i class="icon-cross"></i> @lang('sp::action.reset')</a>
      @endif

    </div>

    @if($isAdvanced)
      <div class="collapse collapse-search {{ $isAdvancedOpen() ? 'show' : '' }}" id="{{ $collapseId }}">
        <div class="collapse-search-body">
          {!! $slot !!}
          @includeIf($folder.'.includes.advanced-search')
        </div>
      </div>
    @endif

</form>
