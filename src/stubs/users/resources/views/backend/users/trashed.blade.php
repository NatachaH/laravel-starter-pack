@extends('backend.layouts.app')

@section('title', mainbar('settings','user', 'trashed'))

@section('content')

  <x-sp-listing :title="trans_choice('backend.model.user',2)" model="User" route="backend.users" header="name|email" :items="$users" show-id />

@endsection
