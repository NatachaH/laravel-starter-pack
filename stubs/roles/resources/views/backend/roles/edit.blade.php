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

      @include('sp::partials.form-footer')

  </form>

@endsection
