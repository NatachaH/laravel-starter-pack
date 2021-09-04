@extends('sp::layouts.backend')

@section('title', __('backend.sidebar.activity-log'))

@section('content')

    @include('sp::includes.page-header', ['title' => $track->model_name.($track->relation_name ? ' > '.$track->relation_name : null).' > '.$track->event_name, 'route' => 'backend.activity-log', 'model' => $track])

    <div class="row">

        <div class="col-lg-8">
          <x-bs-card title="JSON">
            <pre><code>{{ json_encode($track, JSON_PRETTY_PRINT) }}</pre></code>
          </x-bs-card>
        </div>

        <div class="col-lg-4">
            <x-sp-statistic :title="trans_choice('backend.model.track',1)" :value="$track->event_name" :color="$track->event_color">
              <ul class="list-group list-group-flush">

                <li class="list-group-item">
                  <i class="icon-calendar text-muted me-2"></i>
                  {{ $track->time }}
                </li>

                <li class="list-group-item">
                  <i class="icon-content text-muted me-2"></i>
                  <b>{{ $track->model_name }}</b>
                  @can('view',$track->trackable)
                    <a href="{{ route('backend.'.Str::plural($track->model).'.show',$track->trackable_id) }}">
                      {{ '#'.$track->trackable_id.' '.($track->trackable->title ?? $track->trackable->name ?? null) }}
                    </a>
                  @else
                      {{ '#'.$track->trackable_id.' '.($track->trackable->title ?? $track->trackable->name ?? null) }}
                  @endcan
                </li>

                @if($track->relation_model)
                  <li class="list-group-item">
                    <i class="icon-{{ $track->relation_icon }} text-muted me-2"></i>
                    <b>{{ $track->relation_name }}</b>
                    @if($track->relation_id)
                      @can('view',$track->relation)
                        <a href="{{ route('backend.'.Str::plural($track->relation_model).'.show',$track->relation_id) }}">
                          {{ '#'.$track->relation_id.' '.($track->relation->title ?? $track->relation->name ?? null) }}
                        </a>
                      @else
                          {{ '#'.$track->relation_id.' '.($track->relation->title ?? $track->relation->name ?? null) }}
                      @endcan
                    @endif
                  </li>
                @endif

                @if($track->number > 1)
                  <li class="list-group-item">
                    <i class="icon-pin text-muted me-2"></i>
                    @lang('trackable.affected', ['number' => $track->number])
                @endif

                <li class="list-group-item">
                  <i class="icon-user text-muted me-2"></i>
                  <b>@choice('backend.model.user',1)</b>
                  @can('view',$track->user)
                    <a href="{{ route('backend.users.show',$track->user) }}">
                      {{ '#'.$track->user_id.' '.$track->username }}
                    </a>
                  @else
                      {{ ($track->user_id ? '#'.$track->user_id : null).' '.$track->username }}
                  @endcan
                </li>

              </ul>
            </x-sp-statistic>
        </div>

    </div>

@endsection
