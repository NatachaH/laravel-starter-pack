@extends('sp::layouts.backend')

@section('title', mainbar('settings','{{ NAME }}', 'show'))

@section('content')

    @include('sp::includes.page-header', ['title' => ${{ NAME }}->title, 'route' => 'backend.{{ PNAME }}', 'model' => ${{ NAME }}])

    <div class="row">

        <div class="col-lg-8">

            <x-bs-card :title="__('sp::field.information')">
              <p class="lead">{{ ${{ NAME }}->subtitle }}</p>
              {!!${{ NAME }}->description!!}
            </x-bs-card>

            @if(${{ NAME }}->hasMedia())
              <x-bs-card :title="__('sp::field.media')">
                <x-slot name="before">
                    <x-sp-media-listing :items="${{ NAME }}->media" show-dates has-download sortable/>
                </x-slot>
              </x-bs-card>
            @endif

        </div>

        <div class="col-lg-4">
            <x-sp-historic type="model" :items="$page->tracks" />
        </div>

    </div>

@endsection
