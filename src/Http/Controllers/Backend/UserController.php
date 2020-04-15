<?php

namespace Nh\StarterPack\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Nh\StarterPack\Http\Requests\StoreUserRequest;
use Nh\StarterPack\Http\Requests\UpdateAccountRequest;
use Illuminate\Support\Facades\Auth;

use App\User;
use Nh\AccessControl\Role;

class UserController extends Controller
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
        $users = User::paginate();
        return view('sp::backend.users.index', compact('users'));
    }

    /**
     * Display a listing of the resource that are soft deleted.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewTrashed', 'App\User');
        $users = User::onlyTrashed()->paginate();
        return view('sp::backend.users.trashed', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rolesDisabled = Auth::user()->hasRoles('superadmin') ? false : Role::firstWhere('name', 'superadmin')->modelKeys();
        return view('sp::backend.users.create', compact('rolesDisabled'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        User::create($request->only(['name','email','password']));
        session()->flash('toast', ['success' => notification('added','user')]);
        return redirect()->route('backend.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //return view('backend.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $rolesDisabled = Auth::user()->hasRoles('superadmin') ? false : Role::firstWhere('name', 'superadmin')->modelKeys();
        return view('sp::backend.users.edit', compact('user', 'rolesDisabled'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserRequest $request, User $user)
    {
        $user->update($request->only(['name','email','password']));
        session()->flash('toast', ['success' => notification('updated','user')]);
        return redirect()->route('backend.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('toast', ['success' => notification('deleted','user')]);
        return back();
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(int $id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore();
        session()->flash('toast', ['success' => notification('restored','user')]);
        return back();
    }

    /**
     * Remove definitely the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(int $id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->forceDelete();
        session()->flash('toast', ['success' => notification('force-deleted','user')]);
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function editAccount()
    {
        $user = Auth::user();
        return view('sp::backend.users.account.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateAccount(UpdateAccountRequest $request)
    {
        $user = Auth::user();
        $user->update($request->only(['name','email','password']));
        session()->flash('toast', ['success' => notification('updated','account')]);
        return redirect()->route('backend.account.edit');
    }
}
