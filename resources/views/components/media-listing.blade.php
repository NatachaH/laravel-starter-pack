<ul {{ $attributes->merge(['class' => 'list-group list-group-flush '.($sortable ? 'media-sortable' : '')]) }} @if($sortable) data-sortable-model="Nh\Mediable\Media" @endif>

  @foreach ($items as $item)

      <li class="list-group-item d-flex align-items-center" data-id="{{ $item->id }}">

          @if($sortable)
            <button class="btn drag pl-0" aria-label="@lang('sp::action.move')">
              <i class="icon-move"></i>
            </button>
          @endif

          <span class="mr-auto {{ $sortable ? 'border-left pl-3' : '' }}">
            <i class="icon-file-{{ $item->format }} mr-1"></i>
            {{ $item->name ?? $item->filename }} @isset($item->name) <small class="text-muted font-italic">{{ $item->filename }}</small> @endisset
          </span>

          @if($showDate)
            <small class="text-muted font-italic mr-4">{{ $item->created_at }}</small>
          @endif

          @if($hasDownload)
            <a href="{{ $item->url }}" class="btn btn-gray rounded-circle" download target="_blank" aria-label="@lang('sp::action.download')">
              <i class="icon-download"></i>
            </a>
          @endif

      </li>

  @endforeach

</ul>
