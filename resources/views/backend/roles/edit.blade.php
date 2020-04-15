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

      <x-ac-permission-fieldset :legend="trans_choice('backend.model.permission',2)" :values="$role->permissions->modelKeys()" translation="backend.model" :disabled="$permissionsDisabled"/>


      @include('sp::partials.form-footer', ['cancel' => 'backend.roles.index'])

  </form>

@endsection
