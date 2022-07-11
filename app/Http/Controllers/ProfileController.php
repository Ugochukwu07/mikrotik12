<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();

        if ($user->isAdmin())
        {
            return view('admin.profile.profile-index', compact('user'));
        }
        return view('admin.profile.profile-edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->firstOrFail();

        $this->validate($request, [
            'email'      => [
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
        ]);

        if (filled($request->password)) {
            $user->password = bcrypt($request->password);
        }
        $user->emergency = $request->emergency;
        $user->birth = $request->birth;
        $user->company = $request->company;
        $user->phone = $request->phone;
        $user->city = $request->city;
        $user->postcode = $request->postcode;
        $user->address = $request->address;
        $user->save();

        return back()->with("success", __("Profile updated successfully"));
    }
}
