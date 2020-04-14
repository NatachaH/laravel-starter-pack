@extends('sp::layouts.backend')

@section('title', mainbar('settings','user', 'trashed'))

@section('content')

  <x-sp-search route="#"/>

  <x-sp-listing :title="trans_choice('backend.model.user',2)" model="User" route="backend.users" folder="sp::backend.users" header="name|email" :items="$users" show-id show-dates />

@endsection
