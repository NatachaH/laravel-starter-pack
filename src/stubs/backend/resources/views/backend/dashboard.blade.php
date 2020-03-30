@extends('backend.layouts.app')

@section('title', 'Dashboard avec un nom super long')

@section('content')

  <h2>Welcome to the dashboard</h2>
  <p>This is the default layout</p>

  <hr/>

  <x-search action="#" is-advanced>
    Here add the advanced search !
  </x-search>

  <hr/>

  <a class="btn btn-round btn-sm"><i class="icon icon-trash"></i></a>
  <a class="btn btn-round "><i class="icon icon-trash"></i></a>
  <a class="btn btn-round btn-lg"><i class="icon icon-trash"></i></a>
  <a class="btn btn-round disabled"><i class="icon icon-trash"></i></a>
  <a class="btn btn-round-primary"><i class="icon icon-trash"></i></a>
  <a class="btn btn-round-outline-primary"><i class="icon icon-trash"></i></a>

  <hr/>

  <x-listing title="User list" model="User" route="backend.users" header="Name|Description" :items="$users" show-id />


@endsection
