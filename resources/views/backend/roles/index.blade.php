@extends('sp::layouts.backend')

@section('title', mainbar('settings','role', Route::is('backend.roles.search') ? 'search' : ''))

@section('content')

  <x-sp-search key="roles" route="backend.roles"/>

  <x-sp-listing :title="trans_choice('backend.model.role',2)" :items="$roles" header="name" model="Nh\AccessControl\Role" route="backend.roles" folder="sp::backend.roles" show-id :show-dates="Auth::user()->hasRoles('superadmin')" />

@endsection
