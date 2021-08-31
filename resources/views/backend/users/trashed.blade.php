@extends('sp::layouts.backend')

@section('title', trans_choice('backend.model.user',2))

@section('content')

  <x-sp-search model="App\Models\User" key="users" route="backend.users"/>

  <x-sp-listing :title="trans_choice('backend.model.user',2)" :items="$users" header="name|email|role" model="App\Models\User" route="backend.users" folder="sp::backend.users" show-id show-dates="deleted" />

@endsection
