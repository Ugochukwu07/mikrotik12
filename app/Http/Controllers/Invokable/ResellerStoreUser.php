<?php

namespace App\Http\Controllers\Invokable;

use App\Classes\Mikrotik;
use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Settings;
use App\Models\Subscription;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RouterOS\Query;

class ResellerStoreUser extends Controller
{
    protected Mikrotik $checkMikrotikConnection;

    public function __construct()
    {
        $this->middleware('auth');
        $this->checkMikrotikConnection = new Mikrotik();
    }

    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'name'       => 'required',
            'email'      => 'required|email|unique:users',
            'password'   => 'required|min:6|confirmed',
            'phone'      => 'required',
            'address'    => 'required',
            'city'       => 'required',
            'postcode'   => 'required',
            'package_id' => 'required',
            'birth'      => 'required'
        ]);

        if (getSetting("using_mikrotik")) {
            if (!$this->checkMikrotikConnection->checkConnection()) {
                return $this->checkMikrotikConnection->checkConnection();
            }

            if ($request->mikro == "Yes") {
                $query = new Query("/ppp/secret/add");
                $query->equal("name", $request->mikrotik_user);
                $query->equal("password", $request->mikrotik_password);
                $query->equal("service", $request->mikrotik_services);
                $query->equal("profile", $request->mikrotik_profile);
                $this->checkMikrotikConnection->checkConnection()->query($query)->read();
            }

            if ($request->mikro == "No") {
                $query = new Query("/ip/hotspot/user/add");
                $query->equal("name", $request->mikrotik_hotspot_user);
                $query->equal("password", $request->mikrotik_hotspot_password);
                $query->equal("profile", $request->mikrotik_hotspot_profile);
                $this->checkMikrotikConnection->checkConnection()->query($query)->read();
            }
        }

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->customer_id = $request->customer_id;
        $user->password = bcrypt($request->password);
        $user->status = 1;
        $user->company = $request->company;
        $user->phone = $request->phone;
        $user->emergency = $request->emergency;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->postcode = $request->postcode;
        $user->birth = $request->birth;
        $user->reseller_id = auth()->id();

        if (getSetting("using_mikrotik")) {
            if ($request->mikro == "Yes") {
                $user->mikrotik_user = $request->mikrotik_user;
                $user->mikrotik_connection_type = "PPP";
            }

            if ($request->mikro == "No") {
                $user->mikrotik_user = $request->mikrotik_hotspot_user;
                $user->mikrotik_connection_type = "HotSpot";
            }
        }
        $user->save();

        $user->assignRole('user');

        $settings = Settings::firstOrFail();
        $package = Package::where('id', $request->package_id)->firstOrFail();

        $subscription = new Subscription;
        $subscription->package_name = $package->name;
        $subscription->reseller_price = $package->reseller_price ?: 0;
        $subscription->subscription_expires = Carbon::now()
            ->addDays($settings->package_expires_in);
        $subscription->payment_last_day = Carbon::now()
            ->addDays($settings->last_pay_day);
        $subscription->billing_day = Carbon::parse($subscription->subscription_expires)
            ->subDays($settings->invoice_before_expire);
        $subscription->user_status = 1;
        $subscription->payment_status = 0;
        $subscription->user_id = $user->id;
        $subscription->package_id = $package->id;
        $subscription->invoice = $request->invoice;
        $subscription->created_by = auth()->id();
        $subscription->save();

        $transactions = new Transaction();
        $transactions->invoice = $subscription->invoice;
        $transactions->amount = $package->reseller_price ?: 0;
        $transactions->type = 0;
        $transactions->user_id = $user->id;
        $transactions->created_by = auth()->id();
        $transactions->save();

        return redirect('users')->with('success', 'User added successfully');
    }
}
