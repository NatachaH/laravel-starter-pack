@extends('sp::layouts.backend')

@section('title', mainbar('settings','{{ NAME }}', 'trashed'))

@section('content')

  <x-sp-search key="{{ PNAME }}" action="backend.{{ PNAME }}.search"/>

  <x-sp-listing :title="trans_choice('backend.model.{{ NAME }}',2)" model="App\{{ UCNAME }}" route="backend.{{ PNAME }}" header="title" :items="${{ PNAME }}" show-id show-dates />

@endsection
