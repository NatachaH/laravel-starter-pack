<ul {{ $attributes->merge(['class' => 'list-group']) }}>
  @foreach ($tracks as $key => $track)
    <li class="list-group-item">
        <span class="badge badge-{{ $colorByEvent($track->name) }} mb-1">
          @lang('trackable.event.'.$track->name)
        </span>
        <p class="mb-1"><b>@choice('backend.model.'.$track->model,1)</b> - {{ $track->description }}</p>
        <small class="text-muted d-block"><i class="icon-stopwatch"></i> {{ $track->created_at->diffForhumans() }} <i class="icon-user ml-2"></i> {{ $track->user->name }}</small>
    </li>
  @endforeach
</ul>
