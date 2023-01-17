<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>{{ config('app.name') }} - @yield('title')</title>

        <!-- Styles -->
        @vite('resources/sass/error.scss')

    </head>
    <body>

      <div id="error" class="row align-items-center justify-content-center">

        <div class="col-12 col-md-3">
          <img id="logo" class="img-fluid" src="/svg/logo.svg" alt="Logo {{ config('app.name') }}" >
        </div>

        <div class="col-12 col-md-3">
          <h1>@yield('code', __('Oh no'))</h1>
          <p class="lead">@yield('message')</p>
          @if(isset($exception) && in_array($exception->getStatusCode(),[401,403,404,419,429]))
            <a class="btn btn-primary" href="{{ route('home') }}">@lang('Go Home')</a>
          @endif
        </div>

      </div>

    </body>
</html>
