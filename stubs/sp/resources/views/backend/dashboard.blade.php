@extends('sp::layouts.backend')

@section('title', __('backend.sidebar.dashboard'))

@section('content')

  <div class="row">
    <div class="col-lg-8">
      <x-bs-card class="text-center">
        <h2>{!! __('sp::dashboard.welcome', ['name' => Auth::user()->name]) !!}</h2>
        <p class="lead">
          @lang('sp::dashboard.lead')
        </p>
        <p>
          {!! __('sp::dashboard.description') !!}
        </p>
      </x-bs-card>

      <div class="row">
        <div class="col-md-4">
          <x-sp-statistic :title="trans_choice('backend.model.user',2)" :value="$statistics['users']" icon="icon-users"/>
        </div>
        <div class="col-md-4">
          <x-sp-statistic title="Exemple" value="3" icon="icon-content"/>
        </div>
        <div class="col-md-4">
          <x-sp-statistic title="Exemple" value="300" icon="icon-rocket"/>
        </div>
      </div>

    </div>

    <div class="col-lg-4">
      <x-sp-history class="mt-lg-0" :items="$tracks" />
    </div>

  </div>

@endsection
