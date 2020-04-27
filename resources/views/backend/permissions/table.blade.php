<table class="table mb-0">

    <thead>
        <th></th>
        <th class="text-center">@lang('sp::action.view')</th>
        <th class="text-center">@lang('sp::action.create')</th>
        <th class="text-center">@lang('sp::action.update')</th>
        <th class="text-center">@lang('sp::action.delete')</th>
        <th class="text-center">@lang('sp::action.restore')</th>
        <th class="text-center">@lang('sp::action.force-delete')</th>
    </thead>

    <tbody>
      @foreach ($permissions as $key => $permission)
        <tr>
          <td><b>{{ \Lang::has('permission.'.$key) ? trans_choice('permission.'.$key,1) : $key  }}</b></td>
          <td class="text-center">@include('sp::permissions.includes.icon', ['permission' => $permission->firstWhere('action','view')])</td>
          <td class="text-center">@include('sp::permissions.includes.icon', ['permission' => $permission->firstWhere('action','create')])</td>
          <td class="text-center">@include('sp::permissions.includes.icon', ['permission' => $permission->firstWhere('action','update')])</td>
          <td class="text-center">@include('sp::permissions.includes.icon', ['permission' => $permission->firstWhere('action','delete')])</td>
          <td class="text-center">@include('sp::permissions.includes.icon', ['permission' => $permission->firstWhere('action','restore')])</td>
          <td class="text-center">@include('sp::permissions.includes.icon', ['permission' => $permission->firstWhere('action','force-delete')])</td>
        </tr>
      @endforeach
    </tbody>

</table>
