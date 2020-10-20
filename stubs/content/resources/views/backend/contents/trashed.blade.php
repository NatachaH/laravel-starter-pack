@extends('sp::layouts.backend')

@section('title', trans_choice('backend.model.{{ NAME }}',2))

@section('content')

  <x-sp-search key="{{ PNAME }}" route="backend.{{ PNAME }}"/>

  <x-sp-listing :title="trans_choice('backend.model.{{ NAME }}',2)" :items="${{ PNAME }}" header="title|published"  model="App\Models\{{ UCNAME }}" route="backend.{{ PNAME }}" show-id show-dates />

@endsection
