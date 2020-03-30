<form {{ $attributes->merge(['class' => 'search-form']) }} action="{{ $action }}" method="post">

    @csrf

    <div class="input-group">
      <input type="search" class="form-control" placeholder="@lang('backend.search')" aria-label="@lang('backend.search')">
      @if($isAdvanced)
        <button class="btn btn-outline-secondary" type="button" data-toggle="collapse" data-target="#{{ $collapseId }}" aria-expanded="false" aria-controls="{{ $collapseId }}"><i class="icon icon-toggles"></i></button>
      @endif
      <button class="btn btn-outline-brand" type="button"><i class="icon icon-search"></i> @lang('backend.search')</button>
      <button class="btn btn-outline-secondary" type="button"><i class="icon icon-cross"></i> @lang('backend.reset')</button>
    </div>

    @if($isAdvanced)
      <div class="collapse collapse-search" id="{{ $collapseId }}">
        <div class="collapse-search-body">
          {!! $slot !!}
        </div>
      </div>
    @endif

</form>
