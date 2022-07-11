<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ResellerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!auth()->user()->can('view-reseller')) {
            return redirect('dashboard');
        }

        return view('admin.reseller.reseller-index');
    }

    public function create()
    {
        if (!auth()->user()->can('create-reseller')) {
            return redirect('dashboard');
        }

        return view('admin.reseller.reseller-create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'phone'    => 'required',
            'address'  => 'required',
            'city'     => 'required',
        ]);

        $reseller = new User();
        $reseller->name = $request->name;
        $reseller->email = $request->email;
        $reseller->password = bcrypt($request->password);
        $reseller->status = 1;
        $reseller->company = $request->company;
        $reseller->phone = $request->phone;
        $reseller->address = $request->address;
        $reseller->city = $request->city;
        $reseller->postcode = $request->postcode;
        $reseller->birth = $request->birth;
        $reseller->save();

        $reseller->assignRole('reseller');

        return redirect('resellers')->with('success', __('Reseller added successfully'));
    }

    public function show($id)
    {
        if (!auth()->user()->can('view-reseller')) {
            return redirect('dashboard');
        }

        $user = User::role('reseller')->findOrFail($id);
        $users = User::where('reseller_id', $user->id)->orderBy('name')->get();
        return view('admin.reseller.reseller-show', compact('user', 'users'));
    }

    public function edit($id)
    {
        if (!auth()->user()->can('edit-reseller')) {
            return redirect('dashboard');
        }

        $user = User::role('reseller')->findOrFail($id);

        return view('admin.reseller.reseller-edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::role('reseller')->findOrFail($id);
        if (filled($request->password)) {
            $user->password = bcrypt($request->password);
        }
        $user->company = $request->company;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->postcode = $request->postcode;
        $user->birth = $request->birth;
        $user->save();

        return redirect('resellers')->with('success', __('Reseller updated successfully'));
    }
}
