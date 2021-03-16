<div class="table-responsive">
  <table class="table mb-0">

      <thead>
          <th class="td-fit"></th>
          <th class="td-fit text-center">@lang('sp::action.view')</th>
          <th class="td-fit text-center">@lang('sp::action.create')</th>
          <th class="td-fit text-center">@lang('sp::action.update')</th>
          <th class="td-fit text-center">@lang('sp::action.delete')</th>
          <th class="td-fit text-center">@lang('sp::action.restore')</th>
          <th class="td-fit text-center">@lang('sp::action.force-delete')</th>
          <th class="td-fit text-center">@lang('sp::action.import')</th>
          <th class="td-fit text-center">@lang('sp::action.export')</th>
      </thead>

      <tbody>
        @foreach ($permissions as $key => $permission)
          <tr>
            <td class="td-fit"><b>{{ \Lang::has('permission.'.$key) ? __('permission.'.$key) : trans_choice('backend.model.'.$key,1) }}</b></td>
            <td class="text-center">@include('sp::backend.permissions.includes.icon', ['permission' => $permission->firstWhere('action','view')])</td>
            <td class="text-center">@include('sp::backend.permissions.includes.icon', ['permission' => $permission->firstWhere('action','create')])</td>
            <td class="text-center">@include('sp::backend.permissions.includes.icon', ['permission' => $permission->firstWhere('action','update')])</td>
            <td class="text-center">@include('sp::backend.permissions.includes.icon', ['permission' => $permission->firstWhere('action','delete')])</td>
            <td class="text-center">@include('sp::backend.permissions.includes.icon', ['permission' => $permission->firstWhere('action','restore')])</td>
            <td class="text-center">@include('sp::backend.permissions.includes.icon', ['permission' => $permission->firstWhere('action','force-delete')])</td>
            <td class="text-center">@include('sp::backend.permissions.includes.icon', ['permission' => $permission->firstWhere('action','import')])</td>
            <td class="text-center">@include('sp::backend.permissions.includes.icon', ['permission' => $permission->firstWhere('action','export')])</td>
          </tr>
        @endforeach
      </tbody>

  </table>
</div>
