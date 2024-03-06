<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if (auth()->user()->hasRole('admin'))
            return view('dashboard');
        return redirect()->route("events.index");
    }
}
