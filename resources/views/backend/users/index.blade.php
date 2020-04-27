@extends('sp::layouts.backend')

@section('title', mainbar('settings','user', Route::is('backend.users.search') ? 'search' : ''))

@section('content')

  <x-sp-search key="users" action="backend.users.search"/>

  <x-sp-listing :title="trans_choice('backend.model.user',2)" model="App\User" route="backend.users" folder="sp::backend.users" header="name|email|role" :items="$users" show-id :show-dates="Auth::user()->hasRoles('superadmin')" />

@endsection
