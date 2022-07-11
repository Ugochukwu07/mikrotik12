<?php

namespace App\Http\Controllers;

use App\Models\ServiceZone;
use App\Models\User;
use App\View\Components\badge;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!auth()->user()->isAdmin())
        {
            return redirect('dashboard');
        }

        return view('admin.staff.staff-index');
    }

    public function create()
    {
        if (!auth()->user()->isAdmin())
        {
            return redirect('dashboard');
        }

        $roles = Role::where('name', '!=', 'admin')
            ->where('name', '!=', 'reseller')
            ->where('name', '!=', 'user')
            ->get();

        if ($roles->count() === 0 && getSetting('using_staff')) {
            return redirect('roles')->with('danger', __('Add a role before adding staff'));
        }

        return view('admin.staff.staff-create', compact('roles'));
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
            'birth'    => 'required'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->status = 1;
        $user->company = auth()->user()->company;
        $user->phone = $request->phone;
        $user->emergency = $request->emergency;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->postcode = $request->postcode;
        $user->birth = $request->birth;
        $user->save();

        if ($request->role_id) {
            $user->assignRole($request->role_id);
        }

        return redirect('staff')->with('success', __('Staff added successfully'));
    }

    public function edit($id)
    {
        if (!auth()->user()->isAdmin())
        {
            return redirect('dashboard');
        }

        $user = User::findOrFail($id);

        return view('admin.staff.staff-edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'nullable|min:6|confirmed',
            'phone'    => 'required',
            'address'  => 'required',
            'city'     => 'required',
            'postcode' => 'required|numeric'
        ]);

        $user = User::findOrFail($id);
        if (filled($request->password)) {
            $user->password = bcrypt($request->password);
        }
        $user->phone = $request->phone;
        $user->emergency = $request->emergency;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->postcode = $request->postcode;
        $user->birth = $request->birth;
        $user->save();

        return redirect('staff')->with('success', __('Staff updated successfully'));
    }
}
