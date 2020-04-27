@if(!is_null($permission))
  <i class="{{ in_array($permission->id, $checked) ? 'text-success icon-checkmark' : 'text-danger icon-cross' }}"></i>
@else
  <span class="text-muted">-</span>
@endif
