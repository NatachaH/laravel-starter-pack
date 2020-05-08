<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store{{ UCNAME }}Request;
use Illuminate\Http\Request;

use Nh\Searchable\Search;
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
        $this->authorizeResource({{ UCNAME }}::class, '{{ NAME }}');
        $this->middleware('search:{{ PNAME }}')->only('index');
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
     * Display a listing of the searched resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request  $request)
    {
        // Make a Search Class
        $search = new Search('{{ PNAME }}', $request->input('search'));

        // Get an attribute in Search Class
        $keywords = $search->attribute('text');

        // Make the search query
        // The search can be 'contains', 'start' or 'end'
        // And you can decide if all columns match
        ${{ PNAME }} = {{ UCNAME }}::search($keywords,'contains',false)->withTrashed()->paginate();

        // Display the result
        return view('backend.{{ PNAME }}.index', compact('{{ PNAME }}'));
    }

    /**
     * Display a listing of the resource that are soft deleted.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewTrashed', 'App\{{ UCNAME }}');
        ${{ PNAME }} = {{ UCNAME }}::onlyTrashed()->paginate();
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
     * @param  \App\Http\Requests\Store{{ UCNAME }}Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store{{ UCNAME }}Request $request)
    {
        {{ UCNAME }}::create($request->only(['title','subtitle','description','published']));
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
        ${{ NAME }} = ${{ NAME }}->load(['tracks' => function($q){
          return $q->latest()->take(10);
        }]);
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
        ${{ NAME }}->update($request->only(['title','subtitle','description','published']));
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

    /**
     * Restore the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore({{ UCNAME }} ${{ NAME }})
    {
        $this->authorize('restore', ${{ NAME }});
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
    public function forceDelete({{ UCNAME }} ${{ NAME }})
    {
        $this->authorize('forceDelete', ${{ NAME }});
        ${{ NAME }}->forceDelete();
        session()->flash('toast', ['success' => notification('force-deleted','{{ NAME }}')]);
        return back();
    }

}
