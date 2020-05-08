<x-sp-statistic class="{{ $attributes['class'] }}" :title="$title" :value="$value" icon="icon-clock" color="secondary">
  @if($isMultiple)
    <ul class="list-group list-group-flush">
      @foreach ($items as $key => $item)
        <li class="list-group-item">
          <span class="badge badge-{{ $colorByEvent($item->name) }}">@lang('trackable.event.'.$item->name)</span>
          @if($type != 'model')
            <b>
              @choice('backend.model.'.$item->model, 1)
              {{ '#'.$item->trackable_id }}
            </b>
            {{ $item->description }}
          @endif
          <span class="text-muted d-block mt-1">
            <i class="icon-clock"></i> {{ $item->time }}
            @if($type != 'user')
            <i class="icon-user ml-2"></i> {{ $item->username }}
            @endif
          </span>
        </li>
      @endforeach
    </ul>
  @endif
</x-sp-statistic>
