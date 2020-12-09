<div {{ $attributes->merge(['class' => 'toast toast-'.$color]) }} role="alert" aria-live="assertive" aria-atomic="true" data-delay="{{ $delay }}" data-autohide="true">
  <div class="toast-body">
    <i class="{{ $icon }} me-2"></i> <span>{!! $message !!}</span>
  </div>
</div>
