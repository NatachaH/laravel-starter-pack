<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateAccountRequest;
use Illuminate\Support\Facades\Auth;

use NH\AccessControl\Models\Role;

class RoleController extends Controller
{

    /**
    * Instantiate a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate();
        return view('backend.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        Role::create($request->only(['name']));
        session()->flash('toast', ['success' => notification('added','role')]);
        return redirect()->route('backend.roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \NH\AccessControl\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //return view('backend.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \NH\AccessControl\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('backend.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoleRequest  $request
     * @param  \NH\AccessControl\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRoleRequest $request, Role $role)
    {
        $role->update($request->only(['name']));
        session()->flash('toast', ['success' => notification('updated','role')]);
        return redirect()->route('backend.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \NH\AccessControl\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        session()->flash('toast', ['success' => notification('deleted','role')]);
        return back();
    }

}
