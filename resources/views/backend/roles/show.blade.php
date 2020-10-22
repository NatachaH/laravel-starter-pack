@extends('sp::layouts.backend')

@section('title', trans_choice('backend.model.role',2))

@section('content')

  @include('sp::includes.page-header', ['title' => $role->name, 'route' => 'backend.roles', 'model' => $role])

  <div class="row">

      <div class="col-lg-12">

          <x-bs-card :title="trans_choice('backend.model.permission',2)">
            <x-slot name="before">
              @include('sp::backend.permissions.table', ['checked' => $role->permissions->modelKeys()])
            </x-slot>
          </x-bs-card>

      </div>

  </div>

@endsection
