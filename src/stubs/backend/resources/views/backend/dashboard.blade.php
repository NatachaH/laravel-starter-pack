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

  <a class="btn btn-roun btn-sm"><i class="icon icon-trash"></i></a>
  <a class="btn btn-roun "><i class="icon icon-trash"></i></a>
  <a class="btn btn-roun btn-lg"><i class="icon icon-trash"></i></a>
  <a class="btn btn-roun disabled"><i class="icon icon-trash"></i></a>
  <a class="btn btn-roun-primary"><i class="icon icon-trash"></i></a>
  <a class="btn btn-roun-outline-primary"><i class="icon icon-trash"></i></a>

  <hr/>

@endsection
