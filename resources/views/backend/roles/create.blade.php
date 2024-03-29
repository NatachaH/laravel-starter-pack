@extends('sp::layouts.backend')

@section('title', trans_choice('backend.model.role',2))

@section('content')

  <form action="{{ route('backend.roles.store') }}" method="POST" autocomplete="off">

      @csrf
      @method('POST')

      <fieldset>

        <legend>@choice('sp::field.information',2)</legend>

        <x-bs-input :label="__('sp::field.guard')" type="text" name="guard" required/>

        <x-bs-input :label="__('sp::field.name')" type="text" name="name" required/>

      </fieldset>

      @include('sp::backend.permissions.fieldset', ['checked' => [], 'disabled' => Auth::user()->permission_restrictions])

      @include('sp::includes.form.footer', ['cancel' => 'backend.roles.index'])

  </form>

@endsection
