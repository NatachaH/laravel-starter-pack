<x-sp-statistic :title="trans_choice('trackable.latest-activity-log', ($isMultiple ? 2 : 1))" :value="$value" icon="icon-clock" color="secondary">
  @if($isMultiple)
    <ul class="list-group list-group-flush">
      @foreach ($items as $key => $item)
        <li class="list-group-item">
          <span class="badge badge-{{ $colorByEvent($item->name) }}">@lang('trackable.event.'.$item->name)</span>
          @if($type != 'model')
            @choice('backend.model.'.$item->model, 1)
            -
            {{ '#'.$item->trackable_id }}
            -
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
