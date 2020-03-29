<nav class="navbar-nav nav ml-auto">
  <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
  <a class="nav-link" href="#">About</a>
  <a class="nav-link" href="#">Content</a>
  <a class="nav-link" href="{{ route('backend.dashboard') }}">Backend</a>
</nav>
