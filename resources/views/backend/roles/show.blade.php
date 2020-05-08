@extends('sp::layouts.backend')

@section('title', mainbar('settings','role','show'))

@section('content')

  @include('sp::includes.page-header', ['title' => $role->name, 'route' => 'backend.roles', 'model' => $role])

  <div class="row">

      <div class="col-lg-8">

          <x-bs-card :title="trans_choice('backend.model.permission',2)">
            <x-slot name="before">
              @include('sp::backend.permissions.table', ['checked' => $role->permissions->modelKeys()])
            </x-slot>
          </x-bs-card>

      </div>

      <div class="col-lg-4">
          <x-sp-history type="model" :items="$role->tracks" />
      </div>

  </div>

@endsection
