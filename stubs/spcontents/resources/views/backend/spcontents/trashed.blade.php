@extends('sp::layouts.backend')

@section('title', mainbar('settings','{{ NAME }}', 'trashed'))

@section('content')

  <x-sp-search route="#"/>

  <x-sp-listing :title="trans_choice('backend.model.{{ NAME }}',2)" model="{{ UNAME }}" route="backend.{{ PNAME }}" header="name" :items="${{ PNAME }}" show-id />

@endsection
