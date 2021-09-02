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
    @if($item->relation)
      <small class="text-muted">{{ '#'.$item->relation_id }}</small>
    @endif
    {{ $item->relation_name }}
    @if($item->relation_nbr > 1)
      ({{ $item->relation_nbr }})
    @endif
  @endif
</td>

<td>{{ $item->comment }}</td>

<td class="td-fit">
  @can('view',$item->user)
    <a href="{{ route('backend.users.show',$item->user->id) }}">{{ $item->username }}</a>
  @else
    {{ $item->username }}
  @endcan
</td>
