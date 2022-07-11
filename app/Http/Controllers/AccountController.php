<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Category;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!auth()->user()->can('view-accounting'))
        {
            return redirect('dashboard');
        }
        $categories = Category::orderBy('name')->get();

        return view('admin.account.account-index', compact('categories'));
    }

    public function create()
    {
        if (!auth()->user()->can('create-accounting'))
        {
            return redirect('dashboard');
        }

        $categories = Category::orderBy('name')->get();

        if ($categories->count() === 0)
        {
            return redirect('account')->with('warning', 'Create a category first');
        }

        return view('admin.account.account-create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'item' => 'required',
            'amount' => 'required',
            'category_id' => 'required',
            'type' => 'required|boolean',
        ]);

        $accounting = new Account;
        $accounting->item = $request->item;
        $accounting->amount = $request->amount;
        $accounting->type = $request->type;
        $accounting->category_id = $request->category_id;
        $accounting->save();

        return redirect('account');
    }

    public function edit(Account $account)
    {
        //
    }

    public function update(Request $request, Account $account)
    {
        //
    }
}
