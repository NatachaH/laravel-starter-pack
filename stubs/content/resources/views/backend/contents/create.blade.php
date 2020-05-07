@extends('sp::layouts.backend')

@section('title', mainbar('settings','{{ NAME }}','create'))

@section('content')

  <form action="{{ route('backend.{{ PNAME }}.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">

      @csrf
      @method('POST')

      <fieldset >

        <legend>@lang('sp::field.information')</legend>

        <x-bs-check class="custom-switch" type="checkbox" :label="__('sp::field.published')" name="published" value="1" checked boolean/>

        <x-bs-input :label="__('sp::field.title')" type="text" name="title" required/>

        <x-bs-input :label="__('sp::field.subtitle')" type="text" name="subtitle" />

        <x-bs-editor :label="__('sp::field.description')" name="description" />

      </fieldset>

      <x-sp-media-dynamic :legend="__('sp::field.media')" has-name has-download sortable />

      @include('sp::includes.form.footer', ['cancel' => 'backend.{{ PNAME }}.index'])

  </form>

@endsection
