<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} - Backend - @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ mix('js/backend.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/backend.css') }}" rel="stylesheet">
</head>
<body>

  <div class="container-fluid">

      <div class="row">

          @include('backend.partials.sidebar')

          <main class="col-lg-9 col-xl-10">

              @include('backend.partials.mainbar')

              <div class="main-body">
                @yield('content')
              </div>

          </main>

      </div>

  </div>

  <div id="toastNotification">
    @if($flash = session('toast'))
      <x-sp-toast color="{{ $flash->type }}" message="{{ $flash->message }}" />
    @endif
  </div>

  <form id="logoutForm" class="d-none" action="{{ route('logout') }}" method="POST">
      @csrf
  </form>

</body>
</html>
