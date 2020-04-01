@extends('backend.layouts.app')

@section('title', 'Utilisateur')

@section('content')

  <x-sp-search action="#" />

  <x-sp-listing title="List of users" model="User" route="backend.users" header="Name|Email" :items="$users" show-id />

@endsection
