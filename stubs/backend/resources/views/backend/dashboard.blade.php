@extends('sp::layouts.backend')

@section('title', mainbar('dashboard'))

@section('content')

  <div class="row">
    <div class="col-8">
      <div class="jumbotron text-center">
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
          <x-sp-statistic class="m-0" :title="trans_choice('backend.model.user',2)" :value="$statistics['users']" icon="icon-users"/>
        </div>
        <div class="col">
          <x-sp-statistic class="m-0" title="Exemple" value="3" icon="icon-content"/>
        </div>
        <div class="col">
          <x-sp-statistic class="m-0" title="Exemple" value="300" icon="icon-rocket"/>
        </div>
      </div>

    </div>
    <div class="col-4">
      <x-sp-statistic class="m-0 h-100" title="Last activities" value="20.10.2020 à 10:30" icon="icon-time-reverse" color="secondary">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            Add a new content
            <small class="text-muted">20.04.2020 à 10:35 by Natacha</small>
          </li>
          <li class="list-group-item">
            Add a new content
            <small class="text-muted">20.04.2020 à 10:35 by Natacha</small>
          </li>
          <li class="list-group-item">
            Add a new content
            <small class="text-muted">20.04.2020 à 10:35 by Natacha</small>
          </li>
          <li class="list-group-item">
            Add a new content
            <small class="text-muted">20.04.2020 à 10:35 by Natacha</small>
          </li>
          <li class="list-group-item">
            Add a new content
            <small class="text-muted">20.04.2020 à 10:35 by Natacha</small>
          </li>
          <li class="list-group-item">
            Add a new content
            <small class="text-muted">20.04.2020 à 10:35 by Natacha</small>
          </li>
        </ul>
      </x-sp-statistic>
    </div>

  </div>

@endsection
