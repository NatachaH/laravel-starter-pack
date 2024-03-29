@extends('sp::layouts.backend')

@section('title', trans_choice('backend.model.{{ NAME }}',2))

@section('content')

    @include('sp::includes.page-header', ['title' => ${{ NAME }}->title, 'route' => 'backend.{{ PNAME }}', 'model' => ${{ NAME }}])

    <div class="row">

        <div class="col-lg-8">

            <x-bs-card :title="trans_choice('sp::field.information',2)">
              <p class="lead">{{ ${{ NAME }}->subtitle }}</p>
              {!!${{ NAME }}->description!!}
            </x-bs-card>

            @if(${{ NAME }}->hasMedia())
              <x-bs-card :title="trans_choice('backend.model.media',2)">
                <x-slot name="before">
                    <x-sp-media-listing :items="${{ NAME }}->media" show-dates has-preview has-download sortable/>
                </x-slot>
              </x-bs-card>
            @endif

        </div>

        <div class="col-lg-4">
            <x-sp-statistic :title="__('sp::field.visibility')" :value="${{ NAME }}->published ? __('sp::field.published') : __('sp::field.not-published')" :color="${{ NAME }}->published ? 'success' : 'danger'" icon="icon-preview" />
            <x-sp-history type="model" :items="${{ NAME }}->tracks" />
        </div>

    </div>

@endsection
