<?php

namespace Nh\StarterPack\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Nh\StarterPack\Http\Requests\StoreUserRequest;
use Nh\StarterPack\Http\Requests\UpdateAccountRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;
use Nh\Searchable\Search;

use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{

    /**
    * Instantiate a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
        $this->middleware('search:users')->only('index');
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
     * Display a listing of the searched resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // Make a Search Class
        $search = new Search('users', $request->input('search'));

        // Get an attribute in Search Class
        $keywords = $search->attribute('text');
        $withTrashed  = $search->attribute('withTrashed');
        $sortF    = $search->attribute('sort')['field'] ?? null;
        $sortD    = $search->attribute('sort')['direction'] ?? null;

        // Make the search query
        // The search can be 'contains', 'start' or 'end'
        // And you can decide if all columns match
        $users = User::search($keywords,'contains',false);

        // With trashed
        if($withTrashed)
        {
            $users = $users->withTrashed();
        }

        // Make the search query
        $users = $users->sortable($sortF,$sortD)->paginate();

        // Display the result
        return view('sp::backend.users.index', compact('users'));
    }

    /**
     * Display a listing of the resource that are soft deleted.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewTrashed', 'App\Models\User');
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
        $roles = Role::orderBy('name')->get()->pluck('name','id');
        $rolesDisabled = Auth::user()->has_superpowers ? false : Role::select('id')->firstWhere('guard', 'superadmin')->toArray();
        return view('sp::backend.users.create', compact('roles','rolesDisabled'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        Gate::authorize('set-roles', $request->role ?? $request->roles);
        User::create($request->only(['name','email','password']));
        session()->flash('toast', ['success' => notification('added','user')]);
        return redirect()->route('backend.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user = $user->load(['activityTracks' => function($q){
          return $q->take(10);
        }]);
        return view('sp::backend.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::orderBy('name')->get()->pluck('name','id');
        $rolesDisabled = Auth::user()->has_superpowers ? false : Role::select('id')->firstWhere('guard', 'superadmin')->toArray();
        return view('sp::backend.users.edit', compact('user','roles','rolesDisabled'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserRequest $request, User $user)
    {
        Gate::authorize('set-roles', $request->role ?? $request->roles);
        $user->update($request->only(['name','email','password']));
        session()->flash('toast', ['success' => notification('updated','user')]);
        return redirect()->route('backend.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
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
    public function restore(User $user)
    {
        $this->authorize('restore', $user);
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
    public function forceDelete(User $user)
    {
        $this->authorize('forceDelete', $user);
        $user->forceDelete();
        session()->flash('toast', ['success' => notification('force-deleted','user')]);
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
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
     * @param  \App\Models\User  $user
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
