<ul {{ $attributes->merge(['class' => 'list-group list-group-flush '.($sortable ? 'media-sortable' : '')]) }} @if($sortable) data-sortable-model="App\Models\Media" @endif>

  @foreach ($items as $item)

      <li class="list-group-item d-flex align-items-center" data-id="{{ $item->id }}">

          @if($sortable)
            <button class="btn drag ps-0" aria-label="@lang('sp::action.move')">
              <i class="icon-move"></i>
            </button>
          @endif

          <span class="me-auto {{ $sortable ? 'border-left ps-3' : '' }}">
            <i class="icon-file-{{ $item->format }} me-1"></i>
            {{ $item->name ?? $item->filename }} @isset($item->name) <small class="text-muted font-italic">{{ $item->filename }}</small> @endisset
          </span>

          @if($showDates)
            <small class="text-muted font-italic me-4">{{ $item->created_at }}</small>
          @endif

          @if($hasPreview && $item->thumbnail)
            <button type="button" class="btn btn-gray rounded-circle me-1 popover-media" data-bs-toggle="popover" data-bs-content="<img src='{{ $item->thumbnail }}'>" title="@lang('sp::action.preview')" aria-label="@lang('sp::action.preview')">
              <i class="icon-preview"></i>
            </button>
          @endif

          @if($hasDownload)
            <a href="{{ $item->url }}" class="btn btn-gray rounded-circle" download target="_blank" title="@lang('sp::action.download')" aria-label="@lang('sp::action.download')">
              <i class="icon-download"></i>
            </a>
          @endif

      </li>

  @endforeach

</ul>
