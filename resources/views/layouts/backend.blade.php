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

  <div class="container-fluid sidebar-open" id="backend">

      <div class="row">

          @include('sp::partials.sidebar')

          <main class="col-lg-9 col-xl-10">

              @include('sp::partials.mainbar')

              @include('sp::partials.breadcrumb')

              <div class="main-body">
                @yield('content')
              </div>

          </main>

      </div>

  </div>

  <div id="toastNotification">
    @if($toasts = session('toast'))
      @foreach ($toasts as $key => $toast)
        <x-sp-toast :message="$toast" :color="$key" />
      @endforeach
    @endif
    <x-sp-toast class="toast-custom hide" message="" color="success" />
    <x-sp-toast class="toast-custom hide" message="" color="danger" />
  </div>

  <form id="logoutForm" class="d-none" action="{{ route('logout') }}" method="POST">
      @csrf
  </form>

  <x-bs-modal-confirm id="deleteConfirm" color="danger" icon="icon-trash" :title="__('sp::modal.delete.title')" method="DELETE" centered is-static>
    <p>@lang('sp::modal.delete.message')</p>
  </x-bs-modal-confirm>

  <x-bs-modal-confirm id="softDeleteConfirm"  color="danger" icon="icon-trash" :title="__('sp::modal.soft-delete.title')" method="DELETE" centered is-static>
    <p>@lang('sp::modal.soft-delete.message')</p>
  </x-bs-modal-confirm>

  <x-bs-modal-confirm id="restoreConfirm"  icon="icon-time-reverse" :title="__('sp::modal.restore.title')" method="PATCH" centered is-static>
    <p>@lang('sp::modal.restore.message')</p>
  </x-bs-modal-confirm>

</body>
</html>
