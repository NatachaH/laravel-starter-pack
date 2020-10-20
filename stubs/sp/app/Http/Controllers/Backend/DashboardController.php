<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Nh\Trackable\Models\Track;

class DashboardController extends Controller
{
    /**
     * Invoke the sortable controller.
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $statistics['users'] = User::get()->count();
        $tracks = Track::with(['user','trackable'])->latest()->take(4)->get();
        return view('backend.dashboard', compact('statistics','tracks'));
    }
}
