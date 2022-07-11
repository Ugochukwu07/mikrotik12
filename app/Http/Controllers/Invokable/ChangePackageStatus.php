<?php

namespace App\Http\Controllers\Invokable;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class ChangePackageStatus extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request, Package $package)
    {
        $package->update([
            'status' => $request->status
        ]);

        return back()->with('success', __('Package status changed successfully'));
    }
}
