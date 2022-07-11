<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
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

        $roles = Role::where('name', '!=', 'admin')
            ->where('name', '!=', 'reseller')
            ->where('name', '!=', 'user')
            ->get();

        return view('roles.roles-index', compact('roles'));
    }

    public function create()
    {
        if (!auth()->user()->isAdmin())
        {
            return redirect('dashboard');
        }

        $permissions = Permission::all();

        return view('roles.roles-create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $role = new Role();
        $role->name = $request->name;
        $role->save();

        foreach ($request->permission_id as $value) {
            if (is_array($request->checked) && in_array($value, $request->checked, true)) {
                $role->givePermissionTo($value);
            }
        }

        return redirect('roles')->with('success', __('New role added'));
    }

    public function edit(Role $role)
    {
        if (!auth()->user()->isAdmin())
        {
            return redirect('dashboard');
        }

        $permissions = Permission::all();

        return view('roles.roles-edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $role->name = $request->name;
        $role->save();

        $roles = [];

        foreach ($request->permission_id as $key => $value) {
            if (is_array($request->checked) && in_array($value, $request->checked, true)) {
                $roles[] = $value;
            }
        }

        $role->syncPermissions($roles);

        return redirect('roles')->with('success', __('Role updated'));
    }
}
