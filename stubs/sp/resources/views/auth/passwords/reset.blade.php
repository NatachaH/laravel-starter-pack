@extends('sp::layouts.auth')

@section('title', __('Reset Password'))

@section('content')

  <form method="POST" action="{{ route('password.update') }}" class="needs-validation" novalidate>
      @csrf

      <input type="hidden" name="token" value="{{ $token }}">

      @if (session('status'))

          <x-bs-alert class="mb-0" color="success">
            {{ session('status') }}
          </x-bs-alert>

      @else

          <div class="input-group mb-3">
              <span class="input-group-text" id="email"><i class="icon icon-mail"></i></span>
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" placeholder="{{ __('E-Mail Address') }}" aria-label="{{ __('E-Mail Address') }}" aria-describedby="email" required>
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      {{ $message }}
                  </span>
              @enderror
          </div>

          <div class="input-group mb-3">
              <span class="input-group-text" id="password"><i class="icon icon-key"></i></span>
              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" aria-label="{{ __('Password') }}" aria-describedby="password" required>
              @error('password')
                  <span class="invalid-feedback" role="alert">
                      {{ $message }}
                  </span>
              @enderror
          </div>

          <div class="input-group mb-3">
              <span class="input-group-text" id="passwordConfirmation"><i class="icon icon-key"></i></span>
              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" aria-label="{{ __('Confirm Password') }}" aria-describedby="passwordConfirmation" required>
              @error('password')
                  <span class="invalid-feedback" role="alert">
                      {{ $message }}
                  </span>
              @enderror
          </div>


          <button type="submit" class="btn btn-block btn-primary">{{ __('Reset Password') }}</button>

      @endif

  </form>

@endsection
