@extends('sp::layouts.backend')

@section('title', mainbar('settings','permission','edit'))

@section('content')

  <form action="{{ route('backend.permissions.update', $permission->id) }}" method="POST" autocomplete="off">

      @csrf
      @method('PATCH')

      <fieldset >

        <legend>@lang('sp::field.informations')</legend>

        <div class="row">

          <x-bs-input class="col-12" :label="__('sp::field.name')" type="text" name="name" :value="$permission->name" required/>

        </div>

      </fieldset>

      @include('sp::partials.form-footer', ['cancel' => 'backend.permissions.index'])

  </form>

@endsection
