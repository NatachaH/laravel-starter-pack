<form {{ $attributes->merge(['class' => 'search-form']) }} action="{{ $action }}" method="post">

    @csrf

    <div class="input-group">

      <input type="text" name="search[text]" class="form-control" placeholder="@lang('backend.action.search')" aria-label="@lang('backend.action.search')">

      @if($isAdvanced)
        <button class="btn btn-outline-secondary" type="button" data-toggle="collapse" data-target="#{{ $collapseId }}" aria-expanded="false" aria-controls="{{ $collapseId }}"><i class="icon icon-toggles"></i></button>
      @endif

      <button class="btn btn-outline-brand" type="submit"><i class="icon icon-search"></i> @lang('backend.action.search')</button>

      @if($hasSearchData)
        <a href="{{ route($reset) }}" class="btn btn-outline-secondary"><i class="icon icon-cross"></i> @lang('backend.action.reset')</a>
      @endif

    </div>

    @if($isAdvanced)
      <div class="collapse collapse-search" id="{{ $collapseId }}">
        <div class="collapse-search-body">
          {!! $slot !!}
        </div>
      </div>
    @endif

</form>