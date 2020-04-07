@extends('backend.layouts.app')

@section('title', mainbar('settings','user','create'))

@section('content')

  <form action="{{ route('backend.users.store') }}" method="POST" autocomplete="off">

      @csrf
      @method('POST')

      <fieldset >

        <legend>@lang('backend.field.informations')</legend>

        <div class="row">

          <x-bs-input class="col-6" :label="__('backend.field.name')" type="text" name="name" required/>

          <x-bs-input class="col-6" :label="__('backend.field.email')" type="email" name="email" required/>

          <x-bs-input class="col-6" :label="__('Password')" type="password" name="password" :help="__('validation.min.string', ['attribute' => 'password', 'min' => 6])" required/>

          <x-bs-input class="col-6" :label="__('Confirm Password')" type="password" name="password_confirmation" required/>

        </div>

      </fieldset>

      @include('backend.partials.form-footer')

  </form>

@endsection
