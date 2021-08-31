@foreach ($links as $key => $value)
  <nav class="nav flex-column">

      @if(isset($value['link']))
        <h5 class="nav-header">
            <a class="nav-header-link {{ Route::is($value['link']) ? 'active' : '' }}" href="{{ route($value['link']) }}">
              <i class="{{ $value['icon'] }}"></i> @lang('backend.sidebar.'.$key)
            </a>
        </h5>
      @else
        <h5 class="nav-header">
          <i class="{{ $value['icon'] }}"></i> @lang('backend.sidebar.'.$key)
        </h5>
      @endif

      @if(!is_null($value['items']))
          @foreach ($value['items'] as $key => $value)

            @if(isset($value['link']))
                <a class="nav-link {{ Route::is($value['link']) ? 'active' : '' }}" href="{{ route($value['link']) }}">
                  {{ \Lang::has('backend.sidebar.'.$key) ? trans_choice('backend.sidebar.'.$key,1) : trans_choice('backend.model.'.$key,2) }}
                </a>
            @else
                <a class="nav-link {{ Route::is($value['route'].'.*') ? 'active' : '' }}" href="{{ route($value['route'].'.index') }}">
                  {{ \Lang::has('backend.sidebar.'.$key) ? trans_choice('backend.sidebar.'.$key,1) : trans_choice('backend.model.'.$key,2) }}
                </a>
            @endif

          @endforeach
      @endif

  </nav>
@endforeach
