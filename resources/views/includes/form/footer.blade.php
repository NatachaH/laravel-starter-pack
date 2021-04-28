<div class="form-footer row">

  <div class="col-sm-6 order-sm-2 align-self-center mb-3 mb-sm-0 text-sm-end">
    <p class="text-muted">@lang('sp::help.required') | @lang('sp::help.required-if')</p>
  </div>

  <div class="col-sm-6 order-sm-1">
    <button type="submit" class="btn btn-primary rounded-pill">@lang('sp::action.save')</button>
    <a href="{{ route($cancel,$cancelOption ?? null) }}" class="btn btn-outline-secondary rounded-pill">@lang('sp::action.cancel')</a>
  </div>

</div>
