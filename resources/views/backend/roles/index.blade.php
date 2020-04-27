@extends('sp::layouts.backend')

@section('title', mainbar('settings','role'))

@section('content')

  <x-sp-search key="roles" action="backend.roles.search"/>

  <x-sp-listing :title="trans_choice('backend.model.role',2)" model="Nh\AccessControl\Role" route="backend.roles" folder="sp::backend.roles" header="name" :items="$roles" show-id :show-dates="Auth::user()->hasRoles('superadmin')" />

@endsection
