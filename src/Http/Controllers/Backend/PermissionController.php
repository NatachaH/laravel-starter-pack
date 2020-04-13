<?php

namespace Nh\StarterPack\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Nh\AccessControl\Http\Requests\StorePermissionRequest;
use Illuminate\Support\Facades\Auth;

use Nh\AccessControl\Permission;

class PermissionController extends Controller
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
        $permissions = Permission::paginate();
        return view('sp::backend.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sp::backend.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePermissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionRequest $request)
    {
        Permission::create($request->only(['name']));
        session()->flash('toast', ['success' => notification('added','permission')]);
        return redirect()->route('backend.permissions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Nh\AccessControl\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //return view('sp::backend.permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Nh\AccessControl\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('sp::backend.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StorePermissionRequest  $request
     * @param  \Nh\AccessControl\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(StorePermissionRequest $request, Permission $permission)
    {
        $permission->update($request->only(['name']));
        session()->flash('toast', ['success' => notification('updated','permission')]);
        return redirect()->route('backend.permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Nh\AccessControl\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        session()->flash('toast', ['success' => notification('deleted','permission')]);
        return back();
    }

}
