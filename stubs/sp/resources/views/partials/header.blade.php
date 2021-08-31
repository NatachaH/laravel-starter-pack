<header>
    <nav class="container navbar navbar-expand-md navbar-light">

      <a class="navbar-brand" href="{{ route('home') }}">
        <img src="svg/logo.svg" alt="Logo {{ config('app.name') }}" />
      </a>

      <button class="navbar-toggler btn" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="menu">
        @include('partials.navigation')
      </div>

    </nav>
</header>
