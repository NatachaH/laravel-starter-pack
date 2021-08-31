<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>{{ config('app.name') }} - @yield('title')</title>

        <!-- Styles -->
        <link href="{{ mix('css/error.css') }}" rel="stylesheet">

    </head>
    <body>

      <div id="error" class="row align-items-center justify-content-center">

        <div class="col-12 col-md-3">
          <img id="logo" class="img-fluid" src="/svg/logo.svg" alt="Logo {{ config('app.name') }}" />
        </div>

        <div class="col-12 col-md-3">
          <h1>@yield('code', __('Oh no'))</h1>
          <p class="lead">@yield('message')</p>
          <a class="btn btn-primary" href="{{ route('home') }}">@lang('Go Home')</a>
        </div>

      </div>

    </body>
</html>
