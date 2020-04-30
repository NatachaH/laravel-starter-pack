<ul {{ $attributes->merge(['class' => 'list-group']) }}>
  @foreach ($tracks as $key => $track)
    <li class="list-group-item">
      <p class="m-0"><span class="badge badge-{{ $colorByEvent($track->event) }}">{{ $eventName($track->event) }}</span> {{ $modelName($track->trackable_type) }} - {{ $track->trackable->title ?? $track->trackable->name }}</p>
      <small class="text-muted">{{ $track->created_at->format('d.m.Y H:i:s') }} - {{ $track->user->name }}</small>
    </li>
  @endforeach
</ul>
