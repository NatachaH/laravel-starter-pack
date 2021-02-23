<?php

namespace Nh\StarterPack\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Nh\StarterPack\Http\Requests\StoreRoleRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

use Nh\Searchable\Search;
use App\Models\Role;
use Nh\AccessControl\Models\Permission;

class RoleController extends Controller
{

    /**
    * Instantiate a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->authorizeResource(Role::class, 'role');
        $this->middleware('search:roles')->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate();
        return view('sp::backend.roles.index', compact('roles'));
    }

    /**
     * Display a listing of the searched resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request  $request)
    {
        // Make a Search Class
        $search = new Search('roles', $request->input('search'));

        // Get an attribute in Search Class
        $keywords = $search->attribute('text');

        // Make the search query
        $roles = Role::search($keywords,'contains',false)->paginate();

        // Display the result
        return view('sp::backend.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::getByModel();
        return view('sp::backend.roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $role = Role::create($request->only(['guard','name']));
        if($request->has('permissions'))
        {
            Gate::authorize('set-permissions', [$request->permissions]);
            $role->permissions()->attach($request->permissions);
        }
        session()->flash('toast', ['success' => notification('added','role')]);
        return redirect()->route('backend.roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $permissions = Permission::getByModel();
        return view('sp::backend.roles.show', compact('role','permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::getByModel();
        return view('sp::backend.roles.edit', compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoleRequest  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRoleRequest $request, Role $role)
    {
        // Update the role
        $role->update($request->only(['guard','name']));

        // Check if permissions requested is empty
        $permissionsRequested = empty($request->permissions) ? [] : $request->permissions;

        // Check if all permissions input are available for this user
        Gate::authorize('set-permissions', [$permissionsRequested]);

        // Get the permissions ids that are disabled (That the user can't change!)
        $restrictions = Auth::user()->permission_restrictions;
        $permissionsDisabled = $role->permissions->whereIn('id',$restrictions)->modelKeys();

        // Merge the $request with the $permissionsDisabled
        $permissions = array_merge($permissionsRequested, $permissionsDisabled);

        // Sync the permissions
        $role->permissions()->sync($permissions);

        // Success
        session()->flash('toast', ['success' => notification('updated','role')]);
        return redirect()->route('backend.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        session()->flash('toast', ['success' => notification('deleted','role')]);
        return back();
    }

}
