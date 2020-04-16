@extends('sp::layouts.backend')

@section('title', mainbar('settings','role','show'))

@section('content')

  <h2>{{ $role->name }}</h2>

  <div class="card">
    <div class="card-body p-0">
      <x-ac-permission-table class="mb-0" :checked="$role->permissions->modelKeys()" translation="backend.model"/>
    </div>
  </div>

@endsection
