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

          @include('sp::partials.sidebar')

          <main class="col-lg-9 col-xl-10">

              @include('sp::partials.mainbar')

              <div class="main-body">
                @yield('content')
              </div>

          </main>

      </div>

  </div>

  <div id="toastNotification">
    @if($toasts = session('toast'))
      @foreach ($toasts as $key => $toast)
        <x-sp-toast :color="$key" :message="$toast" />
      @endforeach
    @endif
  </div>

  <form id="logoutForm" class="d-none" action="{{ route('logout') }}" method="POST">
      @csrf
  </form>

  <x-sp-modal-confirm name="deleteConfirm" :title="__('sp::modaldelete.title')" :message="__('sp::modaldelete.message')" method="DELETE"/>
  <x-sp-modal-confirm name="restoreConfirm" :title="__('sp::modalrestore.title')" :message="__('sp::modalrestore.message')" method="PATCH" color="brand" icon="icon-time-reverse"/>
  <x-sp-modal-confirm name="forceDeleteConfirm" :title="__('sp::modalforce-delete.title')" :message="__('sp::modalforce-delete.message')" method="DELETE"/>

</body>
</html>
