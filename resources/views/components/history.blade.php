<x-sp-statistic :title="$title" color="secondary" icon="icon-time-reverse">

  @if(count($items))
    <ul {{ $attributes->merge(['class' => 'list-group list-group-flush history']) }} >
      @foreach ($items as $key => $item)
        <li class="list-group-item d-flex">
          <span class="history-tooltip p-2 me-2 badge bg-{{ $color($item->event) }}" data-bs-toggle="tooltip" data-placement="top" title="{{ $tooltip($item) }}">
            <i class="icon-{{ $icon($item->event) }}" aria-label="{{ $tooltip($item) }}"></i>
          </span>
          @if($item->relation)
            <span class="history-tooltip p-2 me-2 badge bg-secondary" data-bs-toggle="tooltip" data-placement="top" title="{{ $relationTooltip($item) }}" >
              <i class="icon-{{ $relationIcon($item->relation) }}" aria-label="{{ $relationTooltip($item) }}"></i>
            </span>
          @endif
          <span>{!! $description($item) !!}</span>
          <small class="text-muted fst-italic ms-auto">{{ $item->time }}</small>
        </li>
      @endforeach
    </ul>
  @endif

</x-sp-statistic>
