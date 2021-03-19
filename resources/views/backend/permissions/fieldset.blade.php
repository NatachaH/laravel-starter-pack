<fieldset>
  <legend>@choice('backend.model.permission',2)</legend>
  <div class="bg-white">

    <div class="table-responsive mb-5">
      <table class="table">
          <thead>
              <th class="td-fit"></th>
              @foreach (config('access-control.permissions.actions') as $action)
                <th class="td-fit"><x-bs-check class="checkbox-all" :label="\Lang::has('sp::action.'.$action) ? __('sp::action.'.$action) : __('permission.action.'.$action)" name="permissionCheckboxAll[]" :value="$action"/></th>
              @endforeach
          </thead>
          <tbody>
            @foreach ($permissionsWithModel as $model => $permission)
              <tr>
                <td class="td-fit"><b>{{ \Lang::has('permission.'.$model) ? __('permission.'.$model) : trans_choice('backend.model.'.$model,1) }}</b></td>
                @foreach (config('access-control.permissions.actions') as $action)
                  <td>@include('sp::backend.permissions.includes.checkbox', ['permission' => $permission->firstWhere('action',$action)])</td>
                @endforeach
              </tr>
            @endforeach
          </tbody>
      </table>
    </div>

    <div class="table-responsive bg-white mb-3">
      <table class="table">
          <thead>
              <th></th>
              <th class="td-fit"><x-bs-check class="checkbox-all" :label="__('sp::action.access')" name="permissionCheckboxAll[]" value="access"/></th>
          </thead>
          <tbody>
            @foreach ($permissionsWithoutModel as $permission)
              <tr>
                <td><b>{{ \Lang::has('permission.'.$permission->name) ? __('permission.'.$permission->name) : $permission->name }}</b></td>
                <td class="td-fit">
                  <x-bs-check
                    class="checkbox-access"
                    :label="__('sp::action.access')"
                    name="permissions[]"
                    :value="$permission->id"
                    :checked="in_array($permission->id, old('permissions',$checked))"
                    :disabled="in_array($permission->id, $disabled)"
                  />
                </td>
              </tr>
            @endforeach
          </tbody>
      </table>
    </div>
    
  </div>
</fieldset>
