<div class="form-footer row">

  <div class="col-lg-8 order-lg-2 align-self-center mb-3 mb-lg-0 text-lg-end">
    <p class="form-legend">@lang('sp::help.required') | @lang('sp::help.required-if')</p>
  </div>

  <div class="col-lg-4 order-lg-1">
    <button type="submit" class="btn btn-primary rounded-pill">@lang('sp::action.save')</button>
    <a href="{{ route($cancel,$cancelOption ?? null) }}" class="btn btn-outline-secondary rounded-pill">@lang('sp::action.cancel')</a>
  </div>

</div>
