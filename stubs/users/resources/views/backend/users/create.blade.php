@extends('sp::layouts.backend')

@section('title', mainbar('settings','user','create'))

@section('content')

  <form action="{{ route('backend.users.store') }}" method="POST" autocomplete="off">

      @csrf
      @method('POST')

      <fieldset >

        <legend>@lang('sp::field.informations')</legend>

        <div class="row">

          <x-bs-input class="col-6" :label="__('sp::field.name')" type="text" name="name" required/>

          <x-bs-input class="col-6" :label="__('sp::field.email')" type="email" name="email" required/>

          <x-bs-input class="col-6" :label="__('Password')" type="password" name="password" :help="__('validation.min.string', ['attribute' => 'password', 'min' => 6])" required/>

          <x-bs-input class="col-6" :label="__('Confirm Password')" type="password" name="password_confirmation" required/>

        </div>

      </fieldset>

      <x-ac-role-fieldset :legend="trans_choice('backend.model.role',1)" required/>

      @include('sp::partials.form-footer', ['cancel' => 'backend.users.index'])

  </form>

@endsection
