@extends('sp::layouts.backend')

@section('title', mainbar('settings','{{ NAME }}', Route::is('backend.{{ PNAME }}.search') ? 'search' : ''))

@section('content')

  <x-sp-search key="{{ PNAME }}" route="backend.{{ PNAME }}" is-advanced />

  <x-sp-listing :items="${{ PNAME }}" header="title|published" model="App\{{ UCNAME }}" route="backend.{{ PNAME }}" show-id />

@endsection
