@extends('sp::layouts.backend')

@section('title', mainbar('settings','permission'))

@section('content')

  <x-sp-search route="#"/>

  <x-sp-listing :title="trans_choice('backend.model.permission',2)" model="Permission" route="backend.permissions" header="name|model|action" :items="$permissions" show-id />

@endsection
