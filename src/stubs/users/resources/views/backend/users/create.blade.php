@extends('backend.layouts.app')

@section('title', mainbar('settings','user','create'))

@section('content')

  <form action="{{ route('backend.users.store') }}" method="POST" autocomplete="off">

      @csrf
      @method('POST')

      <fieldset >

        <legend>@lang('backend.field.informations')</legend>

        <div class="row mb-3">

          <x-bs-input class="col-6" :label="__('backend.field.name')" type="text" name="name" />

          <x-bs-input class="col-6" :label="__('backend.field.email')" type="email" name="email" />

          <x-bs-input class="col-6" :label="__('Password')" type="password" name="password" :help="__('validation.min.string', ['attribute' => 'password', 'min' => 6])" />

          <x-bs-input class="col-6" :label="__('Confirm Password')" type="password" name="password_confirmation" />

        </div>

      </fieldset>

      <button type="submit" class="btn btn-brand btn-sm rounded-pill">@lang('backend.action.create')</button>
      <a href="{{ route('backend.users.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill">@lang('backend.action.cancel')</a>

  </form>

@endsection
