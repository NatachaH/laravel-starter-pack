@foreach (config('backend.sidebar') as $key => $value)
  <nav class="nav flex-column">

      @if(isset($value['link']))
        <h5 class="nav-header">
            <a class="nav-header-link {{ Route::is($value['link']) ? 'active' : '' }}" href="{{ route($value['link']) }}"><i class="{{ $value['icon'] }}"></i> @lang('backend.sidebar.'.$key)</a>
        </h5>
      @else
        <h5 class="nav-header"><i class="{{ $value['icon'] }}"></i> @lang('backend.sidebar.'.$key)</h5>
      @endif

      @if(!is_null($value['items']))
          @foreach ($value['items'] as $key => $value)

            @can($value['action'] ?? 'viewAny', $value['model'])
                @if(isset($value['link']))
                    <a class="nav-link {{ Route::is($value['link']) ? 'active' : '' }}" href="{{ route($value['link']) }}">@lang('backend.sidebar.'.$key)</a>
                @else
                    <a class="nav-link {{ Route::is($value['route'].'.*') ? 'active' : '' }}" href="{{ route($value['route'].'.index') }}">@lang('backend.sidebar.'.$key)</a>
                @endif
            @endcan

          @endforeach
      @endif

  </nav>
@endforeach
