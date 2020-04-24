@extends('sp::layouts.backend')

@section('title', mainbar('settings','role','show'))

@section('content')

  <div class="page-header">
    <h2>{{ $role->name }}</h2>
    @if(Route::has('backend.roles.edit') && Auth::user()->can('update', $role))
        <a href="{{ route('backend.roles.edit',$role->id) }}" class="btn btn-outline-primary rounded-pill" aria-label="@lang('sp::action.edit')"><i class="icon icon-pencil"></i> @lang('sp::action.edit')</a>
    @endif
  </div>

  <x-bs-card :title="trans_choice('backend.model.permission',2)">
    <x-slot name="before">
      <x-ac-permission-table class="mb-0" :checked="$role->permissions->modelKeys()" />
    </x-slot>
  </x-bs-card>

@endsection
