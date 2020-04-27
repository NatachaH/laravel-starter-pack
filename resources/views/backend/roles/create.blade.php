@extends('sp::layouts.backend')

@section('title', mainbar('settings','role','create'))

@section('content')

  <form action="{{ route('backend.roles.store') }}" method="POST" autocomplete="off">

      @csrf
      @method('POST')

      <fieldset >

        <legend>@lang('sp::field.information')</legend>

        <x-bs-input :label="__('sp::field.name')" type="text" name="name" required/>

      </fieldset>

      @include('sp::backend.permissions.fieldset', ['checked' => [], 'disabled' => Auth::user()->role->restrictions()->modelKeys()])

      @include('sp::partials.form-footer', ['cancel' => 'backend.roles.index'])

  </form>

@endsection
