@extends('sp::layouts.backend')

@section('title', mainbar('settings','{{ NAME }}', 'show'))

@section('content')

<div class="card">
  <div class="card-body">
    <h2>{{ ${{ NAME }}->title }}</h2>
    <p class="lead">{{ ${{ NAME }}->subtitle }}</p>
    {!!${{ NAME }}->description!!}
  </div>
</div>

@endsection
