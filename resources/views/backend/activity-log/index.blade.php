@extends('sp::layouts.backend')

@section('title', __('backend.sidebar.activity-log'))

@section('content')

  <x-sp-search key="tracks" model="App\Models\Track" route="backend.activity-log" folder="sp::backend.activity-log" is-advanced />

  <x-sp-listing :items="$tracks" header="track|comment|user" model="App\Models\Track" route="backend.activity-log" folder="sp::backend.activity-log" show-id show-dates="created" />

@endsection
