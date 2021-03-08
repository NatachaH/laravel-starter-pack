<input type="hidden" name="media_to_add[{{ $key }}][type]" value="{{ $type }}" />

@if($hasName)
  <x-bs-input class="w-50 me-2" :label="__('sp::field.filename')" :name="'media_to_add['.$key.'][name]'" :placeholder="__('sp::field.filename')" />
@endif

<x-bs-input-file :class="$hasName ? 'w-50' : 'w-100'" :label="__('sp::field.file')" :name="'media_to_add['.$key.'][file]'" :placeholder="__('sp::action.choose-file')" :button="__('sp::action.browse')" :required="$isRequired"/>
