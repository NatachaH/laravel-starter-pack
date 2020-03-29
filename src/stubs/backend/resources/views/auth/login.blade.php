@extends('layouts.auth')

@section('title', __('Login'))

@section('content')

  <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
      @csrf

      <div class="input-group mb-3">
          <span class="input-group-text" id="name"><i class="icon icon-user"></i></span>
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="{{ __('Name') }}" aria-label="{{ __('Name') }}" aria-describedby="name" required autofocus>
          @error('name')
              <span class="invalid-feedback" role="alert">
                  {{ $message }}
              </span>
          @enderror
      </div>

      <div class="input-group mb-3">
          <span class="input-group-text" id="password"><i class="icon icon-key"></i></span>
          <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" aria-label="{{ __('Password') }}" aria-describedby="password" required>
          @error('password')
              <span class="invalid-feedback" role="alert">
                  {{ $message }}
              </span>
          @enderror
      </div>

      <button type="submit" class="btn btn-block btn-brand">{{ __('Login') }}</button>

      @if (Route::has('password.request'))
          <a class="btn btn-sm btn-block btn-link" href="{{ route('password.request') }}">
              {{ __('Forgot Your Password?') }}
          </a>
      @endif

  </form>

@endsection
