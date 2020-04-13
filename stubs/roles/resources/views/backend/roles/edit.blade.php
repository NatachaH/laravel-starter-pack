@extends('sp::layouts.backend')

@section('title', mainbar('settings','role','edit'))

@section('content')

  <form action="{{ route('backend.roles.update', $role->id) }}" method="POST" autocomplete="off">

      @csrf
      @method('PATCH')

      <fieldset >

        <legend>@lang('sp::field.informations')</legend>

        <div class="row">

          <x-bs-input class="col-12" :label="__('sp::field.name')" type="text" name="name" :value="$role->name" required/>

        </div>

      </fieldset>

      <fieldset >

        <legend>@choice('backend.model.permission',2)</legend>

        <div class="card">
          <x-ac-permission-checkbox class="mb-0" translation="backend.model" :values="$role->permissions->modelKeys()"/>
        </div>

      </fieldset>

      @include('sp::partials.form-footer')

  </form>

@endsection
