@extends('sp::layouts.backend')

@section('title', mainbar('settings','role'))

@section('content')

  <x-sp-search route="#"/>

  <x-sp-listing :title="trans_choice('backend.model.role',2)" model="Role" route="backend.roles" header="name" :items="$roles" show-id />

@endsection
