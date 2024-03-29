<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- Styles -->
    @vite('resources/scss/auth.scss')

</head>

<body class="text-center">

    <div id="auth" class="card">

      <div class="card-header">
        <h1><span class="text-primary font-weight-normal">BACK</span><span class="text-secondary font-weight-light">END</span></h1>
      </div>

      <div class="card-subheader">
        <h2>{{ config('app.name', 'Laravel') }}</h2>
      </div>

      <div class="card-body">
        @yield('content')
      </div>

    </div>

</body>

</html>
