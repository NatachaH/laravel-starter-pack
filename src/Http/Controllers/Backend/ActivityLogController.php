<?php

namespace Nh\StarterPack\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTrackRequest;
use Illuminate\Http\Request;

use Nh\Searchable\Search;
use App\Models\Track;

class ActivityLogController extends Controller
{

    /**
    * Instantiate a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->authorizeResource(Track::class, 'track');
        $this->middleware('search:tracks')->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tracks = Track::sortable()->paginate();
        return view('backend.activity-log.index', compact('tracks'));
    }

    /**
     * Display a listing of the searched resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request  $request)
    {
        // Make a Search Class
        $search = new Search('tracks', $request->input('search'));

        // Get an attribute in Search Class
        $keywords     = $search->attribute('text');
        $user         = $search->attribute('user');
        $startAt      = $search->attribute('start_at');
        $endAt        = $search->attribute('end_at');

        // Make the search query
        // The search can be 'contains', 'start' or 'end'
        // And you can decide if all columns match
        $tracks = Track::search($keywords,'contains',false);

        // Advanced search query
        if($user)
        {
          $tracks = $tracks->whereHas('user', function($q) use ($user) {
              $q->where('name','LIKE','%'.$user.'%');
          });

          if (stripos(config('app.name'), $user ) !== FALSE) {
             $tracks = $tracks->orDoesntHave('user');
          }
        }

        // Advanced search query
        if(isset($startAt) || isset($endAt))
        {
            $tracks = $tracks->searchBetween('created_at',$startAt,$endAt);
        }

        // Return the paginate result
        $tracks = $tracks->sortable()->paginate();

        // Display the result
        return view('backend.activity-log.index', compact('tracks'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function show(Track $track)
    {
        return view('backend.activity-log.show', compact('track'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function destroy(Track $track)
    {
        $track->delete();
        session()->flash('toast', ['success' => notification('deleted','track')]);
        return back();
    }

}
