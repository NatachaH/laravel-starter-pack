@extends('backend.layouts.app')

@section('title', mainbar('settings','user'))

@section('content')

  <x-sp-search route="backend.users" />

  <x-sp-listing title="List of users" model="User" route="backend.users" header="Name|Email" :items="$users" show-id />

@endsection
