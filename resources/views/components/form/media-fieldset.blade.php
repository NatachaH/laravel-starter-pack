<x-bs-dynamic :legend="$legend" :is-active="$isMultiple" :min="$min" :max="$max" :btnAdd="['class' => 'btn-gray rounded-circle','label' => __('sp::media.add'),'value' => '<i class=icon-plus></i>']" :btnRemove="['class' => 'btn-gray rounded-circle','label' => __('sp::media.remove'),'value' => '<i class=icon-minus></i>']">

  @foreach ($current as $key => $media)
    <div class="d-flex align-items-end dynamic-item dynamic-current">

      <i class="icon icon-file-{{ $current->format }} mr-2"></i> {{ $current->name ?? $current->filename }}

      <div class="btn-group-toggle ml-auto" data-toggle="buttons">
         <label class="btn btn-sm btn-gray rounded-circle active">
             <input class="dynamic-delete" type="checkbox" name="media_to_delete[]" value="{{ $media->id }}" aria-label="@lang('sp::media.delete')"><i class="icon icon-trash"></i>
         </label>
      </div>

    </div>
  @endforeach

  <x-slot name="template">
    <input type="hidden" name="media_to_add[KEY][type]" value="{{ $type }}" />

    @if($hasName)
      <x-bs-input class="w-50 mr-2" label="Name" name="media_to_add[KEY][name]" :placeholder="__('sp::media.input.name')" />
    @endif

    <x-bs-input-file :class="$hasName ? 'w-50 mr-2' : 'w-100 mr-2'" label="File" name="media_to_add[KEY][file]" :placeholder="__('sp::media.input.file.placeholder')" :button="__('sp::media.input.file.button')" />
  </x-slot>

</x-bs-dynamic>
