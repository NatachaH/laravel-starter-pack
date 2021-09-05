<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Track;

class DashboardController extends Controller
{
    /**
     * Invoke the sortable controller.
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $statistics['users'] = User::get()->count();
        $tracks = Track::latest('id')->take(10)->get();
        return view('backend.dashboard', compact('statistics','tracks'));
    }
}
