@extends('sp::layouts.backend')

@section('title', mainbar('settings','permission','create'))

@section('content')

  <form action="{{ route('backend.permissions.store') }}" method="POST" autocomplete="off">

      @csrf
      @method('POST')

      <fieldset >

        <legend>@lang('sp::field.informations')</legend>

        <div class="row">

          <x-bs-input class="col-12" :label="__('sp::field.name')" type="text" name="name" required/>

          <x-bs-input class="col-6" :label="__('sp::field.model')" type="text" name="model" />

          <x-bs-input class="col-6" :label="__('sp::field.action')" type="text" name="action" />

        </div>

      </fieldset>

      @include('sp::partials.form-footer')

  </form>

@endsection
