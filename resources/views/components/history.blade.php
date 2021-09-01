<x-sp-statistic :title="$title" color="secondary" icon="icon-time-reverse">

  @if(count($items))
    <ul {{ $attributes->merge(['class' => 'list-group list-group-flush history']) }} >
      @foreach ($items as $key => $item)
        <li class="list-group-item d-flex">

          <span class="history-tooltip p-2 me-2 badge bg-{{ $item->event_color }}" data-bs-toggle="tooltip" data-placement="top" title="{{ $item->event_name }}">
            <i class="icon-{{ $item->event_icon }}" aria-label="{{ $item->event_name }}"></i>
          </span>

          @if($item->relation_model)
            <span class="history-tooltip p-2 me-2 badge bg-secondary" data-bs-toggle="tooltip" data-placement="top" title="{{ $item->relation_name ? $item->relation_name.' ('.$item->relation_nbr.')' : null }}" >
              <i class="icon-{{ $item->relation_icon }}" aria-label="{{ $item->relation_name }}"></i>
            </span>
          @else
            <span class="p-2 me-2 badge bg-secondary" >
              <i class="icon-{{ config('trackable.relations.default.icon') }}"></i>
            </span>
          @endif

          <span class="history-content">

            {!! $description($item) !!}

            @if($item->comment)
              <small class="history-tooltip icon-message" data-bs-toggle="tooltip" data-placement="top" title="{{ $item->comment }}"></small>
            @endif

            <br/>

            <small class="text-muted fst-italic">
              @if($type == 'user')
                {{ ucfirst($item->time) }}
              @else
                {{ ucfirst(__('sp::listing.by', ['name' => $item->username]).' '.$item->time) }}
              @endif
            </small>

          </span>

        </li>
      @endforeach
    </ul>
  @endif

</x-sp-statistic>
