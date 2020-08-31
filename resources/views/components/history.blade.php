<x-sp-statistic class="{{ $attributes['class'] }}" :title="$title" :value="$value" icon="icon-clock" color="secondary">
  @if($isMultiple)
    <ul class="list-group list-group-flush">
      @foreach ($items as $key => $item)
        <li class="list-group-item d-flex">
          <span class="history-tooltip p-2 mr-2 badge badge-{{ $colorByEvent($item->event) }}" data-toggle="tooltip" data-placement="top" title="@lang('trackable.event.'.$item->event)">
            <i class="icon-{{ $iconByEvent($item->event) }}" aria-label="@lang('trackable.event.'.$item->event)"></i>
          </span>
          <span>{!! $descriptionByItem($item) !!}</span>
          <small class="text-muted font-italic ml-auto">{{ $item->time }}</small>
        </li>
      @endforeach
    </ul>
  @endif
</x-sp-statistic>
