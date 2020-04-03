<div class="modal modal-confirm fade" id="{{ $name }}" tabindex="-1" role="dialog" aria-labelledby="{{ $name.'Label' }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-{{ $color }}" id="{{ $name.'Label' }}">
          {{ $title }}
        </h5>
      </div>

      <form action="{{ $action }}" method="POST">
        @csrf
        @method($method)
        <div class="modal-body text-center">
          <p>{{ $message }}</p>
          <button type="button" class="btn btn-outline-secondary rounded-pill" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-{{ $color }} rounded-pill">Confirm</button>
        </div>
      </form>

    </div>
  </div>
</div>
