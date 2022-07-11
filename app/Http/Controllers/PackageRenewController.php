<?php

namespace App\Http\Controllers;

use App\Classes\Mikrotik;
use App\Mail\SubscriptionConfirmed;
use App\Models\Package;
use App\Models\Settings;
use App\Models\Subscription;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use RouterOS\Query;

class PackageRenewController extends Controller
{
    protected Mikrotik $checkMikrotikConnection;

    public function __construct()
    {
        $this->middleware('auth');
        $this->checkMikrotikConnection = new Mikrotik();
    }

    public function edit(User $user)
    {
        if (!auth()->user()->can('edit-user')) {
            return redirect('dashboard');
        }

        if (!getSetting('using_mikrotik'))
        {
            $packages = Package::where('status', 1)->where('type', 2)->orderBy('name')->get();
            return view('admin.users.change-package', compact('user', 'packages'));
        }

        if (getSetting('using_mikrotik') && ($user->mikrotik_connection_type == "PPP"))
        {
            $packages = Package::where('status', 1)->where('type', 1)->orderBy('name')->get();
            $ppp_query = new Query("/ppp/profile/print");
            $ppp_profiles = $this->checkMikrotikConnection->checkConnection()->query($ppp_query)->read();

            return view('admin.users.change-package', compact('user', 'packages', 'ppp_profiles'));
        }

        if (getSetting('using_mikrotik') && ($user->mikrotik_connection_type == "HotSpot"))
        {
            $packages = Package::where('status', 1)->where('type', 0)->orderBy('name')->get();
            $hotspot_query = new Query("/ip/hotspot/user/profile/print");
            $hotspot_profiles = $this->checkMikrotikConnection->checkConnection()->query($hotspot_query)->read();

            return view('admin.users.change-package', compact('user', 'packages', 'hotspot_profiles'));
        }
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'invoice'    => 'required',
        ]);

        if ($user->mikrotik_connection_type && getSetting("using_mikrotik")) {
            if (!$this->checkMikrotikConnection->checkConnection()) {
                return $this->checkMikrotikConnection->checkConnection();
            }

            if ($user->mikrotik_connection_type == "PPP") {
                $query = new Query('/ppp/secret/print');
                $query->where('name', $user->mikrotik_user);
                $secret = $this->checkMikrotikConnection->checkConnection()->query($query)->read();

                $set = new Query('/ppp/secret/set');
                $set->equal('.id', $secret[0]['.id']);
                $set->equal("profile", $request->mikrotik_profile);
                $set->equal('disabled', 'no');
                $this->checkMikrotikConnection->checkConnection()->query($set)->read();
            }

            if ($user->mikrotik_connection_type == "HotSpot") {
                $query = new Query('/ip/hotspot/user/print');
                $query->where('name', $user->mikrotik_user);
                $secret = $this->checkMikrotikConnection->checkConnection()->query($query)->read();

                $set = new Query('/ip/hotspot/user/set');
                $set->equal('.id', $secret[0]['.id']);
                $set->equal("profile", $request->mikrotik_hotspot_profile);
                $set->equal('disabled', 'no');
                $this->checkMikrotikConnection->checkConnection()->query($set)->read();
            }
        }

        $settings = Settings::firstOrFail();
        $package = Package::where('id', $request->package_id)->firstOrFail();
        $user_subscription = Subscription::where('user_id', $user->id)->latest()->firstOrFail();

        $user_subscription->update([
            'subscription_expires' => Carbon::now()
        ]);

        $subscription = new Subscription;
        $subscription->package_name = $package->name;
        if (!$user->reseller_id)
        {
            $subscription->user_price = $package->user_price ?: 0;
        }
        if ($user->reseller_id)
        {
            $subscription->reseller_price = $package->reseller_price ?: 0;
        }
        $subscription->subscription_expires = Carbon::now()
            ->addDays($settings->package_expires_in);
        $subscription->payment_last_day = Carbon::now()
            ->addDays($settings->last_pay_day);
        $subscription->billing_day = Carbon::parse($subscription->payment_last_day)
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
        if (!$user->reseller_id)
        {
            $transactions->amount = $package->user_price ?: 0;
        }
        if ($user->reseller_id)
        {
            $transactions->amount = $package->reseller_price ?: 0;
        }
        $transactions->type = 0;
        $transactions->user_id = $user->id;
        $transactions->created_by = auth()->id();
        $transactions->save();

        if ($user->status == 3)
        {
            $user->update([
                'status' => 1
            ]);
        }

        if (getSetting("using_stripe")) {

            Mail::to($user)->send(new SubscriptionConfirmed($subscription));
        }

        

        return redirect('users')->with('success', __('Subscription renewed'));
    }
}
