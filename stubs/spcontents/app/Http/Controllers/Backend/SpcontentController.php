<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Store{{ UNAME }}Request;
use App\Http\Requests\UpdateAccountRequest;
use Illuminate\Support\Facades\Auth;

use App\{{ UNAME }};

class {{ UNAME }}Controller extends Controller
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
        ${{ PNAME }} = {{ UNAME }}::paginate(5);
        return view('backend.{{ PNAME }}.index', compact('{{ PNAME }}'));
    }

    /**
     * Display a listing of the resource that are soft deleted.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewTrashed', 'App\{{ UNAME }}');
        ${{ PNAME }} = {{ UNAME }}::onlyTrashed()->paginate(5);
        return view('backend.{{ PNAME }}.trashed', compact('{{ PNAME }}'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.{{ PNAME }}.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Store{{ UNAME }}Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store{{ UNAME }}Request $request)
    {
        {{ UNAME }}::create($request->only(['name','email','password']));
        session()->flash('toast', ['success' => notification('added','{{ NAME }}')]);
        return redirect()->route('backend.{{ PNAME }}.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\{{ UNAME }}  ${{ NAME }}
     * @return \Illuminate\Http\Response
     */
    public function show({{ UNAME }} ${{ NAME }})
    {
        return view('backend.{{ PNAME }}.show', compact('{{ NAME }}'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\{{ UNAME }}  ${{ NAME }}
     * @return \Illuminate\Http\Response
     */
    public function edit({{ UNAME }} ${{ NAME }})
    {
        return view('backend.{{ PNAME }}.edit', compact('{{ NAME }}'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Store{{ UNAME }}Request  $request
     * @param  \App\{{ UNAME }}  ${{ NAME }}
     * @return \Illuminate\Http\Response
     */
    public function update(Store{{ UNAME }}Request $request, {{ UNAME }} ${{ NAME }})
    {
        ${{ NAME }}->update($request->only(['name','email','password']));
        session()->flash('toast', ['success' => notification('updated','{{ NAME }}')]);
        return redirect()->route('backend.{{ PNAME }}.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\{{ UNAME }}  ${{ NAME }}
     * @return \Illuminate\Http\Response
     */
    public function destroy({{ UNAME }} ${{ NAME }})
    {
        ${{ NAME }}->delete();
        session()->flash('toast', ['success' => notification('deleted','{{ NAME }}')]);
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
        ${{ NAME }} = {{ UNAME }}::onlyTrashed()->findOrFail($id);
        ${{ NAME }}->restore();
        session()->flash('toast', ['success' => notification('restored','{{ NAME }}')]);
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
        ${{ NAME }} = {{ UNAME }}::onlyTrashed()->findOrFail($id);
        ${{ NAME }}->forceDelete();
        session()->flash('toast', ['success' => notification('force-deleted','{{ NAME }}')]);
        return back();
    }

}
