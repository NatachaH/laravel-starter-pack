<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} - Backend - @yield('title')</title>

    <!-- Scripts -->
    @vite('resources/js/backend.js')
    @stack('scripts')

    <!-- Styles -->
    @vite('resources/sass/backend.scss')
    @stack('styles')
</head>
<body>


  <div class="container-fluid sidebar-on" id="app">

      <div class="row">

          @include('sp::layouts.partials.sidebar')

          <div id="content">

            <header>
              @include('sp::layouts.partials.mainbar')
              @include('sp::layouts.partials.breadcrumb')
            </header>

            <main>
              @yield('content')
            </main>

          </div>

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
