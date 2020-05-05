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

            <x-sp-statistic :title="trans_choice('latest-activity-log',1)" :value="$page->tracks->first()->time" icon="icon-time-reverse" color="secondary">
              <ul class="list-group list-group-flush ">
                @foreach ($page->tracks as $key => $track)
                  <li class="list-group-item">
                    @lang('trackable.track', ['event' => $track->name, 'time' => $track->time, 'by' => $track->username])
                  </li>
                @endforeach
              </ul>
            </x-sp-statistic>

        </div>

    </div>

@endsection
