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

  <a href="#" class="btn btn-default btn-sm rounded-circle"/><i class="icon icon-trash"></i></a>
  <a href="#" class="btn btn-default  rounded-circle"/><i class="icon icon-trash"></i></a>
  <a href="#" class="btn btn-default  btn-lg rounded-circle"/><i class="icon icon-trash"></i></a>

  <a href="#" class="btn btn-default rounded-circle disabled"/><i class="icon icon-trash"></i></a>
  <a href="#" class="btn btn-primary rounded-circle"/><i class="icon icon-trash"></i></a>
  <a href="#" class="btn btn-outline-primary rounded-circle"/><i class="icon icon-trash"></i></a>

  <hr/>

  <x-listing title="User list" model="User" route="backend.users" header="Name|Description" :items="$users" show-id />

  <x-statistic title="My statistic" value="57" color="primary" icon="icon-graph-line" />

@endsection
