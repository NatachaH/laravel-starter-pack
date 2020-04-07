@extends('backend.layouts.app')

@section('title', mainbar('settings','user','edit'))

@section('content')

  <form action="{{ route('backend.users.update', $user->id) }}" method="POST" autocomplete="off">

      @csrf
      @method('PATCH')

      <fieldset >

        <legend>@lang('backend.field.informations')</legend>

        <div class="row">

          <x-bs-input class="col-6" :label="__('backend.field.name')" type="text" name="name" :value="$user->name" required/>

          <x-bs-input class="col-6" :label="__('backend.field.email')" type="email" name="email" :value="$user->email" required/>

          <x-bs-input class="col-6" :label="__('Password')" type="password" name="password" :help="__('backend.help.leave-empty')" />

          <x-bs-input class="col-6" :label="__('Confirm Password')" type="password" name="password_confirmation" />

        </div>

      </fieldset>

      @include('backend.partials.form-footer')

  </form>

@endsection
