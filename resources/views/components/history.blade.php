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
          @else
            <span class="history-tooltip p-2 me-2 badge bg-secondary"  >
              <i class="icon-information"></i>
            </span>
          @endif
          <span class="history-content">
            {!! $description($item) !!}<br/>
            <small class="text-muted fst-italic">
                {{ $authorAndTime($item) }}
            </small>
          </span>
        </li>
      @endforeach
    </ul>
  @endif

</x-sp-statistic>
