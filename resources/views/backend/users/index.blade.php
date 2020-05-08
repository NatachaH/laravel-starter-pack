@extends('sp::layouts.backend')

@section('title', mainbar('settings','user', Route::is('backend.users.search') ? 'search' : ''))

@section('content')

  <x-sp-search key="users" route="backend.users"/>

  <x-sp-listing :title="trans_choice('backend.model.user',2)" :items="$users" header="name|email|role" model="App\User" route="backend.users" folder="sp::backend.users" show-id :show-dates="Auth::user()->hasRoles('superadmin')" />

@endsection
