@extends('sp::layouts.backend')

@section('title', trans_choice('backend.model.{{ NAME }}',2))

@section('content')

  <form action="{{ route('backend.{{ PNAME }}.update', ${{ NAME }}->id) }}" method="POST" autocomplete="off" enctype="multipart/form-data">

      @csrf
      @method('PATCH')

      <fieldset>

        <legend>@choice('sp::field.information',2)</legend>

        <x-bs-check class="form-switch" type="checkbox" :label="__('sp::field.published')" name="published" value="1" :checked="${{ NAME }}->published" boolean/>

        <x-bs-input :label="__('sp::field.slug')" type="text" name="slug" :help="__('sp::help.slug')" :value="${{ NAME }}->slug" :readonly="!Auth::user()->has_superpowers && ${{ NAME }}->is_protected" required/>

        <x-bs-input :label="__('sp::field.title')" type="text" name="title" :value="${{ NAME }}->title" required/>

        <x-bs-input :label="__('sp::field.subtitle')" type="text" name="subtitle" :value="${{ NAME }}->subtitle" />

        <x-bs-editor :label="__('sp::field.description')" name="description" :value="${{ NAME }}->description" />

      </fieldset>

      <x-sp-media-dynamic class="dynamic-media" :legend="trans_choice('sp::field.picture',2)" :items="${{ NAME }}->mediaByType('picture')" type="picture" formats="jpg,png" has-name has-preview has-download sortable  />

      @include('sp::includes.form.footer', ['cancel' => 'backend.{{ PNAME }}.index'])

  </form>

@endsection
