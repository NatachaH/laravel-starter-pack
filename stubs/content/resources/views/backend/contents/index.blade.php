@extends('sp::layouts.backend')

@section('title', mainbar('settings','{{ NAME }}', Route::is('backend.{{ PNAME }}.search') ? 'search' : ''))

@section('content')

  <x-sp-search key="{{ PNAME }}" action="backend.{{ PNAME }}.search"/>

  <x-sp-listing :title="trans_choice('backend.model.{{ NAME }}',2)" :items="${{ PNAME }}" header="title" model="App\{{ UCNAME }}" route="backend.{{ PNAME }}" show-id />

@endsection
