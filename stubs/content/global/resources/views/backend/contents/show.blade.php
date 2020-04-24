@extends('sp::layouts.backend')

@section('title', mainbar('settings','{{ NAME }}', 'show'))

@section('content')

    <div class="page-header">
      <h2>{{ ${{ NAME }}->title }}</h2>
      @if(Route::has('backend.{{ PNAME }}.edit') && Auth::user()->can('update', ${{ NAME }}))
          <a href="{{ route('backend.{{ PNAME }}.edit', ${{ NAME }}->id) }}" class="btn btn-outline-primary rounded-pill" aria-label="@lang('sp::action.edit')"><i class="icon icon-pencil"></i> @lang('sp::action.edit')</a>
      @endif
    </div>

    <x-bs-card :title="__('sp::field.information')">
      <p class="lead">{{ ${{ NAME }}->subtitle }}</p>
      {!!${{ NAME }}->description!!}
    </x-bs-card>

    @if(${{ NAME }}->hasMedia())

      <x-bs-card :title="__('sp::field.media')">
        <x-slot name="before">
            <x-mediable-listing :items="${{ NAME }}->media" show-date has-download sortable/>
        </x-slot>
      </x-bs-card>

    @endif

@endsection
