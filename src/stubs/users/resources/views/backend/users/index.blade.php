@extends('backend.layouts.app')

@section('title', 'Utilisateur')

@section('content')

  <x-search action="#" />

  <x-listing title="List of users" model="User" route="backend.users" header="Name|Email" :items="$users" show-id />

@endsection
