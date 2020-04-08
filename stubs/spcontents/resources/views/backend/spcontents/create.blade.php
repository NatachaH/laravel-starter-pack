@extends('sp::layouts.backend')

@section('title', mainbar('settings','{{ NAME }}','create'))

@section('content')

  <form action="{{ route('backend.{{ PNAME }}.store') }}" method="POST" autocomplete="off">

      @csrf
      @method('POST')

      <fieldset >

        <legend>@lang('sp::field.informations')</legend>

        <div class="row">

          <x-bs-input class="col-12" :label="__('sp::field.title')" type="text" name="title" required/>

          <x-bs-input class="col-12" :label="__('sp::field.subtitle')" type="text" name="subtitle" />

          <x-bs-input class="col-12" :label="__('sp::field.description')" type="text" name="description" />

        </div>

      </fieldset>

      @include('sp::partials.form-footer')

  </form>

@endsection
