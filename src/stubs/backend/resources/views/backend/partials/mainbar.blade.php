<div id="mainbar">

  <button class="btn" type="button" id="openSidebarBtn">
    <i class="icon-menu"></i>
  </button>

  <h1 class="text-truncate">
    @yield('title')
  </h1>

  <div class="dropdown" id="accountDropdown">
    <button class="btn dropdown-toggle" type="button" id="accountDropdownBtn" data-toggle="dropdown" aria-expanded="false">
       <i class="icon-user"></i> <span>{{ Auth::user() ? Auth::user()->name : 'Username' }}</span>
    </button>
    <ul class="dropdown-menu " aria-labelledby="accountDropdown">
      <li><h6 class="dropdown-header">@lang('backend.my-account')</h6></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="#">@lang('backend.edit-profile')</a></li>
      <li><a class="dropdown-item" href="{{ route('logout')}}" onclick="event.preventDefault();document.getElementById('logoutForm').submit();">@lang('Logout')</a></li>
    </ul>
  </div>

</div>
