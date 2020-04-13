@extends('sp::layouts.backend')

@section('title', mainbar('settings','user','edit'))

@section('content')

  <form action="{{ route('backend.users.update', $user->id) }}" method="POST" autocomplete="off">

      @csrf
      @method('PATCH')

      <fieldset >

        <legend>@lang('sp::field.informations')</legend>

        <div class="row">

          <x-bs-input class="col-6" :label="__('sp::field.name')" type="text" name="name" :value="$user->name" required/>

          <x-bs-input class="col-6" :label="__('sp::field.email')" type="email" name="email" :value="$user->email" required/>

          <x-bs-input class="col-6" :label="__('Password')" type="password" name="password" :help="__('sp::help.leave-empty')" />

          <x-bs-input class="col-6" :label="__('Confirm Password')" type="password" name="password_confirmation" />

        </div>

      </fieldset>

      <x-ac-role-fieldset :legend="trans_choice('backend.model.role',1)" :value="$user->role->id" required/>

      @include('sp::partials.form-footer')

  </form>

@endsection
