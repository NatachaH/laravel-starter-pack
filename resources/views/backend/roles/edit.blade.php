@extends('sp::layouts.backend')

@section('title', mainbar('settings','role','edit'))

@section('content')

  <form action="{{ route('backend.roles.update', $role->id) }}" method="POST" autocomplete="off">

      @csrf
      @method('PATCH')

      <fieldset >

        <legend>@lang('sp::field.information')</legend>

        <x-bs-input :label="__('sp::field.name')" type="text" name="name" :value="$role->name" required/>

      </fieldset>

      @include('sp::permissions.fieldset', ['checked' => $role->permissions->modelKeys(), 'disabled' => Auth::user()->role->restrictions()->modelKeys()])

      @include('sp::partials.form-footer', ['cancel' => 'backend.roles.index'])

  </form>

@endsection
