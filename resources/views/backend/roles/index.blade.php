@extends('sp::layouts.backend')

@section('title', trans_choice('backend.model.role',2))

@section('content')

  <x-sp-search key="roles" model="App\Models\Role" route="backend.roles"/>

  <x-sp-listing :items="$roles" header="name|guard" model="App\Models\Role" route="backend.roles" folder="sp::backend.roles" show-id :show-dates="Auth::user()->has_superpowers" />

@endsection
