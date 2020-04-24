<div class="page-header">

  <h2>{{ $title }}</h2>

  @if(Route::has($route.'.edit') && Auth::user()->can('update', $model))
      <a href="{{ route($route.'.edit',$model->id) }}" class="btn btn-primary rounded-pill" aria-label="@lang('sp::action.edit')"><i class="icon icon-pencil"></i> @lang('sp::action.edit')</a>
  @endif

</div>
