<nav class="nav flex-column">
    <h5 class="nav-header">
      <a class="nav-header-link {{ Route::is('backend.dashboard') ? 'active' : '' }}" href="{{ route('backend.dashboard') }}"><i class="icon-dashboard"></i> @lang('backend.sidebar.dashboard')</a>
    </h5>
</nav>

<nav class="nav flex-column">
    <h5 class="nav-header"><i class="icon-gear"></i> @lang('backend.sidebar.settings')</h5>
    <a class="nav-link {{ Route::is('backend.users.*') ? 'active' : '' }}" href="{{ route('backend.users.index') }}">@lang('backend.sidebar.users')</a>
</nav>

<nav class="nav flex-column">
    <h5 class="nav-header"><i class="icon-content"></i> @lang('backend.sidebar.contents')</h5>
    <a class="nav-link" href="#">Un lien</a>
    <a class="nav-link" href="#">Un autre lien</a>
</nav>
