@extends('sp::layouts.backend')

@section('title', trans_choice('backend.model.{{ NAME }}',2))

@section('content')

  <form action="{{ route('backend.{{ PNAME }}.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">

      @csrf
      @method('POST')

      <fieldset>

        <legend>@choice('sp::field.information',2)</legend>

        <x-bs-check class="form-switch" type="checkbox" :label="__('sp::field.published')" name="published" value="1" checked boolean/>

        <x-bs-input :label="__('sp::field.slug')" type="text" name="slug" :help="__('sp::help.slug')" required/>

        <x-bs-input :label="__('sp::field.title')" type="text" name="title" required/>

        <x-bs-input :label="__('sp::field.subtitle')" type="text" name="subtitle" />

        <x-bs-editor :label="__('sp::field.description')" name="description" />

      </fieldset>

      <x-sp-media-dynamic class="dynamic-media" :legend="trans_choice('sp::field.picture',2)" type="picture" formats="jpg,png" weight="16" has-name sortable />

      @include('sp::includes.form.footer', ['cancel' => 'backend.{{ PNAME }}.index'])

  </form>

@endsection
