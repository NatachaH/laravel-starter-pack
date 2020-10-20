@extends('sp::layouts.backend')

@section('title', trans_choice('backend.model.user',2))

@section('content')

  <x-sp-search key="users" route="backend.users"/>

  <x-sp-listing :items="$users" header="name|email|role" model="App\Models\User" route="backend.users" folder="sp::backend.users" show-id :show-dates="Auth::user()->hasRoles('superadmin')" />

@endsection
