@extends('sp::layouts.backend')

@section('title', mainbar('settings','role','show'))

@section('content')

  @include('sp::partials.page-header', ['title' => $role->name, 'route' => 'backend.roles', 'model' => $role])

  <x-bs-card :title="trans_choice('backend.model.permission',2)">
    <x-slot name="before">
      <x-ac-permission-table class="mb-0" :checked="$role->permissions->modelKeys()" />
    </x-slot>
  </x-bs-card>

@endsection
