@extends('sp::layouts.backend')

@section('title', mainbar('settings','{{ NAME }}', 'show'))

@section('content')

    @include('sp::partials.page-header', ['title' => ${{ NAME }}->title, 'route' => 'backend.{{ PNAME }}', 'model' => ${{ NAME }}])

    <div class="row">

        <div class="col-lg-8">

            <x-bs-card :title="__('sp::field.information')">
              <p class="lead">{{ ${{ NAME }}->subtitle }}</p>
              {!!${{ NAME }}->description!!}
            </x-bs-card>

            @if(${{ NAME }}->hasMedia())
              <x-bs-card :title="__('sp::field.media')">
                <x-slot name="before">
                    <x-sp-media-listing :items="${{ NAME }}->media" show-date has-download sortable/>
                </x-slot>
              </x-bs-card>
            @endif

        </div>

        <div class="col-lg-4">

            <x-bs-card class="" :title="trans_choice('trackable.latest',2)">
              <x-slot name="before">
                <x-sp-track-listing class="list-group-flush" :tracks="${{ NAME }}->tracks" />
              </x-slot>
            </x-bs-card>

        </div>

    </div>

@endsection
