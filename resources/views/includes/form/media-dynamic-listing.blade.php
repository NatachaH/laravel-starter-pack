@if($hasName)
  <x-bs-input class="w-50 mr-2" :label="__('sp::field.filename')" :name="'media_to_update['.$item->id.'][name]'" :value="$item->name" />
@endif

<x-bs-input :class="$hasName ? 'w-50 mr-2' : 'w-100 mr-2'" :label="__('sp::field.file')" :name="'media_to_update['.$item->id.'][file]'" :value="$item->filename" readonly :input-group="$hasDownload">
  @if($hasDownload)
    <x-slot name="after">
      <a href="{{ $item->url }}" class="btn btn-gray" download target="_blank" aria-label="@lang('sp::action.download')">
        <i class="icon-download"></i>
      </a>
    </x-slot>
  @endif
</x-bs-input>
