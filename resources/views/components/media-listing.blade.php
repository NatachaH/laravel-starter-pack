<ul class="list-group list-group-flush {{ $sortable ? 'sortable' : '' }}" @if($sortable) data-sortable-model="Nh\Mediable\Media" @endif>
  @foreach ($items as $item)
    <li class="list-group-item d-flex align-items-center" data-id="{{ $item->id }}">
      @if($sortable)
        <i class="icon-move drag mr-3 pr-3 border-right"></i>
      @endif
      <span class="mr-auto"><i class="icon-file-{{ $item->format }} mr-1"></i> {{ $item->name ?? $item->filename }} @isset($item->name) <small class="text-muted font-italic">{{ $item->filename }}</small> @endisset</span>
      @if($showDate)
        <small class="text-muted font-italic mr-4">{{ $item->created_at }}</small>
      @endif
      @if($hasDownload)
        <a href="{{ $item->url }}" class="btn btn-sm btn-gray rounded-circle " download target="_blank"><i class="icon-download"></i></a>
      @endif
    </li>
  @endforeach
</ul>
