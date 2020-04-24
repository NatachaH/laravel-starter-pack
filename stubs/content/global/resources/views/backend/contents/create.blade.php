@extends('sp::layouts.backend')

@section('title', mainbar('settings','{{ NAME }}','create'))

@section('content')

  <form action="{{ route('backend.{{ PNAME }}.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">

      @csrf
      @method('POST')

      <fieldset >

        <legend>@lang('sp::field.information')</legend>

        <x-bs-input :label="__('sp::field.title')" type="text" name="title" required/>

        <x-bs-input :label="__('sp::field.subtitle')" type="text" name="subtitle" />

        <x-sp-editor :label="__('sp::field.description')" name="description" />

      </fieldset>

      <x-mediable-fieldset :legend="__('sp::field.media')" type="pictures" has-name is-multiple has-download sortable />

      @include('sp::partials.form-footer', ['cancel' => 'backend.{{ PNAME }}.index'])

  </form>

@endsection
