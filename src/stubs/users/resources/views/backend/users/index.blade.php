@extends('backend.layouts.app')

@section('title', trans_choice('backend.user',2))

@section('content')

  <x-sp-search route="backend.users" />

  <x-sp-listing title="List of users" model="User" route="backend.users" header="Name|Email" :items="$users" show-id />

@endsection
