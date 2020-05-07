@extends('sp::layouts.backend')

@section('title', mainbar('settings','user', 'trashed'))

@section('content')

  <x-sp-search key="users" action="backend.users.search"/>

  <x-sp-listing :title="trans_choice('backend.model.user',2)" :items="$users" header="name|email|role" model="App\User" route="backend.users" folder="sp::backend.users" show-id show-dates />

@endsection
