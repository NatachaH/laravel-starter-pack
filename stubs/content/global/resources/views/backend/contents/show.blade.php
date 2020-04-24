@extends('sp::layouts.backend')

@section('title', mainbar('settings','{{ NAME }}', 'show'))

@section('content')

    @include('sp::partials.page-header', ['title' => ${{ NAME }}->title, 'route' => 'backend.{{ PNAME }}', 'model' => ${{ NAME }}])

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
