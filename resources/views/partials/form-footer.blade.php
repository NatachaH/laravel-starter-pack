<div class="form-footer row">

  <div class="col-sm-6 order-sm-2 align-self-center mb-3 mb-sm-0 text-sm-right">
    <p class="text-muted">@lang('help.required')</p>
  </div>

  <div class="col-sm-6 order-sm-1">
    <button type="submit" class="btn btn-primary rounded-pill">@lang('action.save')</button>
    <a href="{{ route($cancel) }}" class="btn btn-outline-secondary rounded-pill">@lang('action.cancel')</a>
  </div>

</div>
