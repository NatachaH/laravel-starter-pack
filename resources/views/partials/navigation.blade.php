@foreach (config('backend.sidebar') as $key => $value)
  <nav class="nav flex-column">

      @if(is_null($value['link']))
        <h5 class="nav-header"><i class="{{ $value['icon'] }}"></i> @lang('backend.sidebar.'.$key)</h5>
      @else
        <h5 class="nav-header">
            <a class="nav-header-link {{ Route::is($value['link']) ? 'active' : '' }}" href="{{ route($value['link']) }}"><i class="{{ $value['icon'] }}"></i> @lang('backend.sidebar.'.$key)</a>
        </h5>
      @endif

      @if(!is_null($value['items']))
          @foreach ($value['items'] as $key => $value)

            @if(is_array($value))
                <a class="nav-link {{ Route::is($value['active']) ? 'active' : '' }}" href="{{ route($value['link']) }}">@lang('backend.sidebar.'.$key)</a>
            @else
                <a class="nav-link {{ Route::is($value.'.*') ? 'active' : '' }}" href="{{ route($value.'.index') }}">@lang('backend.sidebar.'.$key)</a>
            @endif

          @endforeach
      @endif

  </nav>
@endforeach
