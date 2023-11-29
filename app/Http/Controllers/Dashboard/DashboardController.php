<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $title = trans('main.dashboard');
        return view('dashboard.welcome', compact('title'));
    }
}
