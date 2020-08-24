<div id="mainbar">

  <button class="btn" type="button" id="openSidebarBtn" aria-label="Menu">
    <i class="icon-menu"></i>
  </button>

  <h1 class="text-truncate">
    @yield('title')
  </h1>

  <a class="btn " href="{{ url('/') }}" target="_blank" >
     <i class="icon-web"></i> <span>@lang('backend.mainbar.website')</span>
  </a>

  <div class="dropdown" id="accountDropdown">
    <button class="btn dropdown-toggle" type="button" id="accountDropdownBtn" data-toggle="dropdown" aria-expanded="false">
       <i class="icon-user"></i> <span>{{ Auth::user() ? Auth::user()->name : 'Username' }}</span>
    </button>
    <ul class="dropdown-menu " aria-labelledby="accountDropdown">
      <li><h6 class="dropdown-header">@lang('backend.mainbar.account.preview')</h6></li>
      <li><hr class="dropdown-divider"></li>
        @foreach (config('backend.mainbar.account') as $key => $value)
          <li>
            <a class="dropdown-item {{ Route::is($value) ? 'active' : '' }}" href="{{ route($value) }}">
              {{ \Lang::has('backend.mainbar.account.'.$key) ? trans_choice('backend.mainbar.account.'.$key,1) : $key }}
            </a>
          </li>
        @endforeach
      <li>
        <a class="dropdown-item" href="{{ route('logout')}}" onclick="event.preventDefault();document.getElementById('logoutForm').submit();">
          @lang('Logout')
        </a>
      </li>
    </ul>
  </div>

</div>
