@extends('sp::layouts.backend')

@section('title', mainbar('settings','{{ NAME }}','edit'))

@section('content')

  <form action="{{ route('backend.{{ PNAME }}.update', ${{ NAME }}->id) }}" method="POST" autocomplete="off">

      @csrf
      @method('PATCH')

      <fieldset >

        <legend>@lang('sp::field.information')</legend>

        <x-bs-input :label="__('sp::field.title')" type="text" name="title" :value="${{ NAME }}->title" required/>

        <x-bs-input :label="__('sp::field.subtitle')" type="text" name="subtitle" :value="${{ NAME }}->subtitle" />

        <x-sp-editor :label="__('sp::field.description')" name="description" :value="${{ NAME }}->description" />

      </fieldset>

      <x-sp-media-fieldset type="pictures" :current="${{ NAME }}->media" has-name is-multiple />

      @include('sp::partials.form-footer', ['cancel' => 'backend.{{ PNAME }}.index'])

  </form>

@endsection
