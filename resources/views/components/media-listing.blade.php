<ul class="list-group list-group-flush">
  @foreach ($items as $item)
    <li class="list-group-item d-flex align-items-center">
      <span clasS="mr-auto"><i class="icon-file-{{ $item->format }}"></i> {{ $item->name ?? $item->filename }} @isset($item->name) <small class="text-muted font-italic">{{ $item->filename }}</small> @endisset</span>
      @if($showDate)
        <small class="text-muted font-italic mr-4">{{ $item->created_at }}</small>
      @endif
      @if($hasDownload)
        <a href="{{ $item->url }}" class="btn btn-sm btn-gray rounded-circle " download target="_blank"><i class="icon-download"></i></a>
      @endif
    </li>
  @endforeach
</ul>
