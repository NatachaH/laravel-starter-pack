<nav class="nav flex-column">
    <h5 class="nav-header">
      <a class="nav-header-link {{ Route::is('backend.dashboard') ? 'active' : '' }}" href="{{ route('backend.dashboard') }}"><i class="icon-dashboard"></i> @lang('backend.nav.dashboard')</a>
    </h5>
</nav>

<nav class="nav flex-column">
    <h5 class="nav-header"><i class="icon-gear"></i> @lang('backend.nav.settings')</h5>
    <a class="nav-link {{ Route::is('backend.users.*') ? 'active' : '' }}" href="{{ route('backend.users.index') }}">@choice('backend.user',2)</a>
</nav>

<nav class="nav flex-column">
    <h5 class="nav-header"><i class="icon-content"></i> @lang('backend.nav.contents')</h5>
    <a class="nav-link" href="#">Un lien</a>
    <a class="nav-link" href="#">Un autre lien</a>
</nav>
