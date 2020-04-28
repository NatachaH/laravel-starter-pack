<fieldset>

  <legend>@choice('backend.model.permission',2)</legend>
    <div class="table-responsive">
      <table class="table bg-white mb-0">

          <thead>
              <th></th>
              <th><x-bs-check class="checkbox-all" :label="__('sp::action.view')" name="permissionCheckboxAll[]" value="view"/></th>
              <th><x-bs-check class="checkbox-all" :label="__('sp::action.create')" name="permissionCheckboxAll[]" value="create"/></th>
              <th><x-bs-check class="checkbox-all" :label="__('sp::action.update')" name="permissionCheckboxAll[]" value="update"/></th>
              <th><x-bs-check class="checkbox-all" :label="__('sp::action.delete')" name="permissionCheckboxAll[]" value="delete"/></th>
              <th><x-bs-check class="checkbox-all" :label="__('sp::action.restore')" name="permissionCheckboxAll[]" value="restore"/></th>
              <th><x-bs-check class="checkbox-all" :label="__('sp::action.force-delete')" name="permissionCheckboxAll[]" value="force-delete"/></th>
          </thead>

          <tbody>
            @foreach ($permissions as $key => $permission)
              <tr>
                <td><b>{{ \Lang::has('permission.'.$key) ? trans_choice('permission.'.$key,1) : $key  }}</b></td>
                <td>@include('sp::backend.permissions.includes.checkbox', ['permission' => $permission->firstWhere('action','view')])</td>
                <td>@include('sp::backend.permissions.includes.checkbox', ['permission' => $permission->firstWhere('action','create')])</td>
                <td>@include('sp::backend.permissions.includes.checkbox', ['permission' => $permission->firstWhere('action','update')])</td>
                <td>@include('sp::backend.permissions.includes.checkbox', ['permission' => $permission->firstWhere('action','delete')])</td>
                <td>@include('sp::backend.permissions.includes.checkbox', ['permission' => $permission->firstWhere('action','restore')])</td>
                <td>@include('sp::backend.permissions.includes.checkbox', ['permission' => $permission->firstWhere('action','force-delete')])</td>
              </tr>
            @endforeach
          </tbody>

      </table>
    </div>
</fieldset>
