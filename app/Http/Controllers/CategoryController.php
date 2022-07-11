<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');        
    }

    public function store(Request $request)
    {
        $categories = new Category;
        $categories->name = $request->name;
        $categories->save();

        return back();
    }
}
