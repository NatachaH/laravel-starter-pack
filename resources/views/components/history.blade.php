<x-sp-statistic :title="$title" color="secondary" icon="icon-time-reverse">

  @if(count($items))
    <ul {{ $attributes->merge(['class' => 'list-group list-group-flush history']) }} >
      @foreach ($items as $key => $item)
        <li class="list-group-item d-flex">
          <span class="history-tooltip p-2 mr-2 badge bg-{{ $color($item->event) }}" data-toggle="tooltip" data-placement="top" title="@lang('trackable.event.'.$item->event)">
            <i class="icon-{{ $icon($item->event) }}" aria-label="@lang('trackable.event.'.$item->event)"></i>
          </span>
          @if($item->relation)
            <span class="history-tooltip p-2 mr-2 badge bg-secondary" data-toggle="tooltip" data-placement="top" title="@choice('model.'.$item->relation,1) {{ $item->comment ? ': '.$item->comment :'' }}" >
              <i class="icon-{{ $relationIcon($item->relation) }}" aria-label="@choice('model.'.$item->relation,1)"></i>
            </span>
          @endif
          <span>{!! $description($item) !!}</span>
          <small class="text-muted fst-italic ml-auto">{{ $item->time }}</small>
        </li>
      @endforeach
    </ul>
  @endif

</x-sp-statistic>
