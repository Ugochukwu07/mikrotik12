<?php

namespace App\Http\Controllers;

use App\Models\EmailTemplates;
use Illuminate\Http\Request;

class EmailTemplatesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $template = EmailTemplates::where('id', 1)->get();
        return view('emails.subscription', compact('template'));
    }

    public function create()
    {
        //
    }
}
