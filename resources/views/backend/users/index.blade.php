@extends('sp::layouts.backend')

@section('title', mainbar('settings','user'))

@section('content')

  <x-sp-search route="#"/>

  <x-sp-listing :title="trans_choice('backend.model.user',2)" model="App\User" route="backend.users" folder="sp::backend.users" header="name|email" :items="$users" show-id :show-dates="Auth::user()->hasRoles('superadmin')" />

@endsection
