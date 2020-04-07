@extends('sp::layouts.backend')

@section('title', mainbar('settings','{{ NAME }}','edit'))

@section('content')

  <form action="{{ route('backend.{{ PNAME }}.update', ${{ NAME }}->id) }}" method="POST" autocomplete="off">

      @csrf
      @method('PATCH')

      <fieldset >

        <legend>@lang('sp::field.informations')</legend>

        <div class="row">

          <x-bs-input :label="__('sp::field.name')" type="text" name="name" :value="${{ NAME }}->name" required/>

        </div>

      </fieldset>

      @include('sp::partials.form-footer')

  </form>

@endsection
