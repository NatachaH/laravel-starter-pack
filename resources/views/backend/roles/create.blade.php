@extends('sp::layouts.backend')

@section('title', mainbar('settings','role','create'))

@section('content')

  <form action="{{ route('backend.roles.store') }}" method="POST" autocomplete="off">

      @csrf
      @method('POST')

      <fieldset >

        <legend>@lang('sp::field.informations')</legend>

        <div class="row">

          <x-bs-input class="col-12" :label="__('sp::field.name')" type="text" name="name" required/>

        </div>

      </fieldset>

      <x-ac-permission-fieldset :legend="trans_choice('backend.model.permission',2)"/>

      @include('sp::partials.form-footer', ['cancel' => 'backend.roles.index'])

  </form>

@endsection
