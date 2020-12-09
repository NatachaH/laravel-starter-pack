<nav class="navbar-nav ms-auto">
  <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
  <a class="nav-link" href="#">Content</a>
  <a class="nav-link" href="{{ route('backend.dashboard') }}">Backend</a>
</nav>
