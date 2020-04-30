<ul {{ $attributes->merge(['class' => 'list-group']) }}>
  @foreach ($tracks as $key => $track)
    <li class="list-group-item">
      <p class="m-0">
        <span class="badge badge-{{ $colorByEvent($track->name) }}">
          @lang('trackable.event.'.$track->name)
        </span>
        @choice('backend.model.'.$track->model,1) - {{ $track->description }}</p>
      <small class="text-muted">{{ $track->created_at->format('d.m.Y H:i:s') }} - {{ $track->user->name }}</small>
    </li>
  @endforeach
</ul>
