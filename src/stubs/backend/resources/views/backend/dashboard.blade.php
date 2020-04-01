@extends('backend.layouts.app')

@section('title', 'Dashboard avec un nom super long')

@section('content')

  <h2>Welcome to the dashboard</h2>
  <p>This is the default layout</p>


  <hr/>

  <a href="#" class="btn btn-default btn-sm rounded-circle"/><i class="icon icon-trash"></i></a>
  <a href="#" class="btn btn-default  rounded-circle"/><i class="icon icon-trash"></i></a>
  <a href="#" class="btn btn-default  btn-lg rounded-circle"/><i class="icon icon-trash"></i></a>

  <a href="#" class="btn btn-default rounded-circle disabled"/><i class="icon icon-trash"></i></a>
  <a href="#" class="btn btn-primary rounded-circle"/><i class="icon icon-trash"></i></a>
  <a href="#" class="btn btn-outline-primary rounded-circle"/><i class="icon icon-trash"></i></a>

  <hr/>

  <div class="row">
    <div class="col">
      <x-statistic title="My statistic" value="57'065" unit="CHF" color="brand" icon="icon-graph-line" />
    </div>
    <div class="col">
      <x-statistic title="My statistic" value="211" color="primary" icon="icon-lightbulb" />
    </div>
    <div class="col">
      <x-statistic title="My statistic" value="57" unit="piece" color="success" icon="icon-graph-pie" />
    </div>
    <div class="col">
        <x-statistic title="My statistic" value="126" color="danger" icon="icon-hourglass">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Vestibulum at eros</li>
          </ul>
        </x-statistic>
    </div>
  </div>

@endsection
