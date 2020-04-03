@extends('backend.layouts.app')

@section('title', mainbar('settings','user','edit'))

@section('content')

  <form action="{{ route('backend.users.update', $user->id) }}" method="POST" autocomplete="off">

      @csrf
      @method('PATCH')

      <fieldset >

        <legend>Information</legend>

        <div class="row mb-3">

          <x-bs-input class="col-6" label="Your name" type="text" name="name" :value="$user->name" />

          <x-bs-input class="col-6" label="Your email" type="email" name="email" :value="$user->email" />

          <x-bs-input class="col-6" label="Your password" type="password" name="password" help="At least 6" />

          <x-bs-input class="col-6" label="confirm password" type="password" name="password_confirmation" />

        </div>

      </fieldset>

      <button type="submit" class="btn btn-brand btn-sm rounded-pill">Save</button>
      <a href="{{ route('backend.users.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill">Cancel</a>

  </form>

@endsection
