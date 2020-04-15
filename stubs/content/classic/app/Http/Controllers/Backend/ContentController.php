<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store{{ UCNAME }}Request;

use App\{{ UCNAME }};

class {{ UCNAME }}Controller extends Controller
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
        ${{ PNAME }} = {{ UCNAME }}::paginate();
        return view('backend.{{ PNAME }}.index', compact('{{ PNAME }}'));
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
     * @param  \App\Http\Requests\Store{{ UCNAME }}Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store{{ UCNAME }}Request $request)
    {
        {{ UCNAME }}::create($request->only(['title','subtitle','description']));
        session()->flash('toast', ['success' => notification('added','{{ NAME }}')]);
        return redirect()->route('backend.{{ PNAME }}.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\{{ UCNAME }}  ${{ NAME }}
     * @return \Illuminate\Http\Response
     */
    public function show({{ UCNAME }} ${{ NAME }})
    {
        return view('backend.{{ PNAME }}.show', compact('{{ NAME }}'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\{{ UCNAME }}  ${{ NAME }}
     * @return \Illuminate\Http\Response
     */
    public function edit({{ UCNAME }} ${{ NAME }})
    {
        return view('backend.{{ PNAME }}.edit', compact('{{ NAME }}'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Store{{ UCNAME }}Request  $request
     * @param  \App\{{ UCNAME }}  ${{ NAME }}
     * @return \Illuminate\Http\Response
     */
    public function update(Store{{ UCNAME }}Request $request, {{ UCNAME }} ${{ NAME }})
    {
        ${{ NAME }}->update($request->only(['title','subtitle','description']));
        session()->flash('toast', ['success' => notification('updated','{{ NAME }}')]);
        return redirect()->route('backend.{{ PNAME }}.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\{{ UCNAME }}  ${{ NAME }}
     * @return \Illuminate\Http\Response
     */
    public function destroy({{ UCNAME }} ${{ NAME }})
    {
        ${{ NAME }}->delete();
        session()->flash('toast', ['success' => notification('deleted','{{ NAME }}')]);
        return back();
    }

}
