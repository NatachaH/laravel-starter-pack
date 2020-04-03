@extends('backend.layouts.app')

@section('title', mainbar('settings','user'))

@section('content')

  <x-sp-search route="backend.users" />

  <x-sp-listing model="User" route="backend.users" header="name|email" :items="$users" show-id />

@endsection
