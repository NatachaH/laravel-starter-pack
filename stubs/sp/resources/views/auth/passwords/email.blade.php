@extends('sp::layouts.auth')

@section('title', __('Reset Password'))

@section('content')

  <form method="POST" action="{{ route('password.email') }}" class="needs-validation" novalidate>
      @csrf

      @if (session('status'))

          <x-bs-alert class="mb-0" color="success">
            {{ session('status') }}
          </x-bs-alert>

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

          <button type="submit" class="btn btn-block btn-primary">{{ __('Send Password Reset Link') }}</button>

      @endif

  </form>

@endsection
