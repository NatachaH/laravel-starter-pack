<div class="table-responsive">
  <table class="table mb-5">
      <thead>
          <th class="td-fit"></th>
          @foreach (config('access-control.permissions.actions') as $action)
            <th class="td-fit text-center">{{ \Lang::has('sp::action.'.$action) ? __('sp::action.'.$action) : __('permission.action.'.$action) }}</th>
          @endforeach
      </thead>
      <tbody>
        @foreach ($permissionsWithModel as $model => $permission)
          <tr>
            <td class="td-fit"><b>{{ \Lang::has('permission.'.$model) ? __('permission.'.$model) : trans_choice('backend.model.'.$model,1) }}</b></td>
            @foreach (config('access-control.permissions.actions') as $action)
              <td class="text-center">@include('sp::backend.permissions.includes.icon', ['permission' => $permission->firstWhere('action',$action)])</td>
            @endforeach
          </tr>
        @endforeach
      </tbody>
  </table>
</div>

<div class="table-responsive">
  <table class="table">
      <thead>
          <th></th>
          <th class="td-fit text-center">@lang('sp::action.access')</th>
      </thead>
      <tbody>
        @foreach ($permissionsWithoutModel as $permission)
          <tr>
            <td><b>{{ \Lang::has('permission.'.$permission->name) ? __('permission.'.$permission->name) : $permission->name }}</b></td>
            <td class="td-fit text-center">@include('sp::backend.permissions.includes.icon', ['permission' => $permission])</td>
          </tr>
        @endforeach
      </tbody>
  </table>
</div>
