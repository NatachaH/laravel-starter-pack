@extends('sp::layouts.auth')

@section('title', __('Reset Password'))

@section('content')

  <form method="POST" action="{{ route('password.email') }}" class="needs-validation" novalidate>
      @csrf

      @if (session('status'))

          <div class="alert alert-success mb-0" role="alert">
              {{ session('status') }}
          </div>

      @else

          <div class="input-group mb-3">
              <span class="input-group-text" id="email"><i class="icon icon-mail"></i></span>
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{ __('E-Mail Address') }}" aria-label="{{ __('E-Mail Address') }}" aria-describedby="email" required autofocus>
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      {{ $message }}
                  </span>
              @enderror
          </div>

          <button type="submit" class="btn btn-block btn-brand">{{ __('Send Password Reset Link') }}</button>

      @endif

  </form>

@endsection
