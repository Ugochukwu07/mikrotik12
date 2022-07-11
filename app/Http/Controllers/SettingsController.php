<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        if (!auth()->user()->isAdmin()) {
            return redirect('dashboard');
        }

        $settings = Settings::firstOrFail();
        $user = User::role("admin")->firstOrFail();
        return view("admin.settings.settings-index", compact("settings", "user"));
    }

    public function update(Request $request, Settings $settings)
    {
        $this->validate($request, [
            "package_expires_in"    => "required|numeric",
            "last_pay_day"          => "required|numeric",
            "mikrotik_ip"           => "nullable|ip",
        ]);

        $settings->using_reseller = $request->has("using_reseller");
        $settings->using_staff = $request->has("using_staff");
        $settings->using_stripe = $request->has("using_stripe");
        $settings->using_mikrotik = $request->has("using_mikrotik");
        $settings->using_customer_manager = $request->has("using_customer_manager");
        $settings->using_service_zone = $request->has("using_service_zone");
        $settings->package_expires_in = $request->package_expires_in ?? 0;
        $settings->last_pay_day = $request->last_pay_day ?? 0;
        $settings->invoice_before_expire = $request->last_pay_day ?? 0;
        $settings->mikrotik_ip = $request->mikrotik_ip;
        $settings->mikrotik_login_password = $request->mikrotik_password;
        $settings->mikrotik_login_username = $request->mikrotik_username;
        $settings->save();

        return back()->with("success", __("Settings updated successfully"));
    }
}
