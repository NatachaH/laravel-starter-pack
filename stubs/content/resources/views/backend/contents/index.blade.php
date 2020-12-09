@extends('sp::layouts.backend')

@section('title', trans_choice('backend.model.{{ NAME }}',2))

@section('content')

  <x-sp-search key="{{ PNAME }}" model="App\Models\{{ UCNAME }}" route="backend.{{ PNAME }}" is-advanced />

  <x-sp-listing :items="${{ PNAME }}" header="title|published" model="App\Models\{{ UCNAME }}" route="backend.{{ PNAME }}" show-id />

@endsection
