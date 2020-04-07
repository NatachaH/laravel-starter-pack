@extends('sp::layouts.backend')

@section('title', mainbar('settings','{{ NAME }}','create'))

@section('content')

  <form action="{{ route('backend.{{ PNAME }}.store') }}" method="POST" autocomplete="off">

      @csrf
      @method('POST')

      <fieldset >

        <legend>@lang('sp::field.informations')</legend>

        <div class="row">

          <x-bs-input :label="__('sp::field.name')" type="text" name="name" required/>

        </div>

      </fieldset>

      @include('sp::partials.form-footer')

  </form>

@endsection
