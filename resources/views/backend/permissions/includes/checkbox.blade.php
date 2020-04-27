@if(!is_null($permission))
  <x-bs-check
    :class="'checkbox-'.$permission->action"
    :label="__('sp::action.'.$permission->action)"
    name="permissions[]"
    :value="$permission->id"
    :checked="in_array($permission->id, old('permissions',$this->optionsChecked))"
    :disabled="in_array($permission->id, $disabled)"
  />
@else
  <span class="text-muted">-</span>
@endif
