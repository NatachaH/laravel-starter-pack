@extends('sp::layouts.backend')

@section('title', trans_choice('backend.model.role',2))

@section('content')

  <form action="{{ route('backend.roles.update', $role->id) }}" method="POST" autocomplete="off">

      @csrf
      @method('PATCH')

      <fieldset>

        <legend>@lang('sp::field.information')</legend>

        <x-bs-input :label="__('sp::field.guard')" type="text" name="guard" :value="$role->guard" required/>

        <x-bs-input :label="__('sp::field.name')" type="text" name="name" :value="$role->name" required/>

      </fieldset>

      @include('sp::backend.permissions.fieldset', ['checked' => $role->permissions->modelKeys(), 'disabled' => Auth::user()->permission_restrictions])

      @include('sp::includes.form.footer', ['cancel' => 'backend.roles.index'])

  </form>

@endsection
