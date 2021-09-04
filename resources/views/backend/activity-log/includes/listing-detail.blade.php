<td>
  <span class="history-tooltip p-2 me-2 badge bg-{{ $item->event_color }}" data-bs-toggle="tooltip" data-placement="top" title="{{ $item->event_name }}">
    <i class="icon-{{ $item->event_icon }}" aria-label="{{ $item->event_name }}"></i>
  </span>

  <small class="text-muted">
    {{ '#'.$item->trackable_id }}
  </small>
  {{ $item->model_name }}

  @if($item->relation_model)
    >
    {{ $item->relation_name }}
  @endif

  @if($item->number > 1)
    ({{ $item->number }})
  @endif
</td>

<td>{{ $item->comment }}</td>

<td class="td-fit">
    {{ $item->username }}
</td>
