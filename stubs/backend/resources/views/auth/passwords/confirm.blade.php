@extends('sp::layouts.auth')

@section('title', __('Confirm Password'))

@section('content')

  <p class="small">
    {{ __('Please confirm your password before continuing.') }}
  </p>

  <form method="POST" action="{{ route('password.confirm') }}" class="needs-validation" novalidate>
      @csrf

      <div class="input-group mb-3">
          <span class="input-group-text" id="password"><i class="icon icon-key"></i></span>
          <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" aria-label="{{ __('Password') }}" aria-describedby="password" required>
          @error('password')
              <span class="invalid-feedback" role="alert">
                  {{ $message }}
              </span>
          @enderror
      </div>

      <button type="submit" class="btn btn-block btn-brand">{{ __('Confirm Password') }}</button>

      @if (Route::has('password.request'))
          <a class="btn btn-sm btn-block btn-link" href="{{ route('password.request') }}">
              {{ __('Forgot Your Password?') }}
          </a>
      @endif

  </form>

@endsection
