<?php

namespace Nh\StarterPack\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Nh\StarterPack\Http\Requests\StoreRoleRequest;
use Illuminate\Support\Facades\Auth;

use Nh\AccessControl\Role;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissionsDisabled = Auth::user()->role->restrictions()->modelKeys();
        return view('sp::backend.roles.create',compact('permissionsDisabled'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $role = Role::create($request->only(['name']));
        if($request->has('permissions'))
        {
            Gate::authorize('set-role-permissions', [$request->permissions]);
            $role->permissions()->attach($request->permissions);
        }
        session()->flash('toast', ['success' => notification('added','role')]);
        return redirect()->route('backend.roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Nh\AccessControl\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('sp::backend.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Nh\AccessControl\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissionsDisabled = Auth::user()->role->restrictions()->modelKeys();
        return view('sp::backend.roles.edit', compact('role','permissionsDisabled'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoleRequest  $request
     * @param  \Nh\AccessControl\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRoleRequest $request, Role $role)
    {
        $role->update($request->only(['name']));
        Gate::authorize('set-role-permissions', [$request->permissions]);
        $role->permissions()->sync($request->permissions);
        session()->flash('toast', ['success' => notification('updated','role')]);
        return redirect()->route('backend.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Nh\AccessControl\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        session()->flash('toast', ['success' => notification('deleted','role')]);
        return back();
    }

}
