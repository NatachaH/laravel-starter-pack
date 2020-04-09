@extends('sp::layouts.backend')

@section('title', mainbar('settings','{{ NAME }}','edit'))

@section('content')

  <form action="{{ route('backend.{{ PNAME }}.update', ${{ NAME }}->id) }}" method="POST" autocomplete="off">

      @csrf
      @method('PATCH')

      <fieldset >

        <legend>@lang('sp::field.informations')</legend>

        <div class="row">

          <x-bs-input class="col-12" :label="__('sp::field.title')" type="text" name="title" :value="${{ NAME }}->title" required/>

          <x-bs-input class="col-12" :label="__('sp::field.subtitle')" type="text" name="subtitle" :value="${{ NAME }}->subtitle" />

          <x-sp-editor class="col-12" :label="__('sp::field.description')" name="description" :value="${{ NAME }}->description" />

        </div>

      </fieldset>

      @include('sp::partials.form-footer')

  </form>

@endsection
