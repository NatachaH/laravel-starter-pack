@extends('sp::layouts.backend')

@section('title', mainbar('dashboard'))

@section('content')

  <div class="row">
    <div class="col-lg-8">
      <div class="jumbotron text-center mb-0">
        <h2>{!! __('sp::dashboard.welcome', ['name' => Auth::user()->name]) !!}</h2>
        <p class="lead">
          @lang('sp::dashboard.lead')
        </p>
        <p>
          {!! __('sp::dashboard.description') !!}
        </p>
      </div>

      <div class="row">
        <div class="col">
          <x-sp-statistic :title="trans_choice('backend.model.user',2)" :value="$statistics['users']" icon="icon-users"/>
        </div>
        <div class="col">
          <x-sp-statistic title="Exemple" value="3" icon="icon-content"/>
        </div>
        <div class="col">
          <x-sp-statistic title="Exemple" value="300" icon="icon-rocket"/>
        </div>
      </div>

    </div>
    <div class="col-lg-4">
      <x-bs-card class="mt-lg-0" :title="trans_choice('latest-activity-log',2)">
        <x-slot name="before">
          <x-sp-track-listing class="list-group-flush" :tracks="$tracks" />
        </x-slot>
      </x-bs-card>
    </div>

  </div>

@endsection
