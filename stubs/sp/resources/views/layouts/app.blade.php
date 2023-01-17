<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- SEO -->
      <meta name="description" content="">
      <meta name="keywords" content="">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <!-- Title -->
      <title>{{ config('app.name') }} - @yield('title')</title>

      <!-- Favicon -->
      <link rel="shortcut icon" href="{{ asset('favicon.png') }}">

      <!-- Scripts -->
      @vite('resources/js/app.js')

      <!-- Styles -->
      @vite('resources/sass/app.scss')
      
  </head>
  <body>

      @include('partials.header')

      <main class="container">
          @yield('content')
      </main>

      @include('partials.footer')

  </body>
  </html>
