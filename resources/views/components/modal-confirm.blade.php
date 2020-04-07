<div class="modal modal-confirm fade" id="{{ $name }}" tabindex="-1" role="dialog" aria-labelledby="{{ $name.'Label' }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <i class="icon {{ $icon }} bg-{{ $color }} text-white"></i>
        <h5 class="modal-title text-{{ $color }}" id="{{ $name.'Label' }}">
          {{ $title }}
        </h5>
      </div>

      <form action="{{ $action }}" method="POST">
        @csrf
        @method($method)
        <div class="modal-body text-center">
          <p>{!! $message !!}</p>
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">@lang('backend.action.cancel')</button>
          <button type="submit" class="btn btn-{{ $color }}">@lang('backend.action.confirm')</button>
        </div>
      </form>

    </div>
  </div>
</div>
