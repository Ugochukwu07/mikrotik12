<?php

namespace App\Http\Controllers;

class MikrotikController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!auth()->user()->can('view-mikrotik')) {
            return redirect('dashboard');
        }
        return view('admin.mikrotik.mikrotik-index');
    }
}
