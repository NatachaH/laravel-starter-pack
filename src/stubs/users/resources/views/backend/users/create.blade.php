@extends('backend.layouts.app')

@section('title', trans_choice('backend.user',2))

@section('content')

  <form action="{{ route('backend.users.store') }}" method="POST" autocomplete="off">

      @csrf
      @method('POST')

      <fieldset >

        <legend>Information</legend>

        <div class="row mb-3">

          <x-bs-input class="col-6" label="Your name" type="text" name="name" />

          <x-bs-input class="col-6" label="Your email" type="email" name="email" />

          <x-bs-input class="col-6" label="Your password" type="password" name="password" help="At least 6" />

          <x-bs-input class="col-6" label="confirm password" type="password" name="password_confirmation" />

        </div>

      </fieldset>

      <button type="submit" class="btn btn-brand btn-sm rounded-pill">Save</button>
      <a href="{{ route('backend.users.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill">Cancel</a>

  </form>

@endsection
