@if($hasName)
  <x-bs-input class="w-50 me-2" :label="__('sp::field.filename')" :name="'media_to_update['.$item->id.'][name]'" :value="$item->name" />
@endif

<x-bs-input :class="$hasName ? 'w-50' : 'w-100'" :label="__('sp::field.file')" :name="'media_to_update['.$item->id.'][file]'" :value="$item->filename" readonly :input-group="$hasDownload" :required="$isRequired">
  @if($hasPreview || $hasDownload)
    <x-slot name="after">
        @if($hasPreview && $item->thumbnail)
            <button type="button" class="btn btn-gray popover-media" data-bs-toggle="popover" data-bs-content="<img src='{{ $item->thumbnail }}' />" title="@lang('sp::action.preview')" aria-label="@lang('sp::action.preview')">
              <i class="icon-preview"></i>
            </button>
        @endif
        @if($hasDownload)
            <a href="{{ $item->url }}" class="btn btn-gray" download target="_blank" title="@lang('sp::action.download')" aria-label="@lang('sp::action.download')">
              <i class="icon-download"></i>
            </a>
        @endif
    </x-slot>
  @endif
</x-bs-input>
