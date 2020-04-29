<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

class DashboardController extends Controller
{
    /**
     * Invoke the sortable controller.
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $statistics['users'] = User::get()->count();
        return view('backend.dashboard', compact('statistics'));
    }
}
