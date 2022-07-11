<?php

namespace App\Http\Controllers;

use App\Classes\Mikrotik;
use App\Mail\SubscriptionConfirmed;
use App\Models\MikrotikService;
use App\Models\Package;
use App\Models\ServiceZone;
use App\Models\Settings;
use App\Models\Subscription;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RouterOS\Query;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    protected Mikrotik $checkMikrotikConnection;

    public function __construct()
    {
        $this->middleware('auth');
        $this->checkMikrotikConnection = new Mikrotik();
    }

    public function index()
    {
        if (!auth()->user()->can('view-user')) {
            return redirect('dashboard');
        }
        return view('admin.users.users-index');
    }

    public function create(Request $request)
    {
        if (!auth()->user()->can('create-user')) {
            return redirect('dashboard');
        }

        $zones = ServiceZone::all();
        $services = MikrotikService::orderBy('name')->get();
        $packages = Package::where('status', 1)->orderBy('name')->get();
        if($packages->count() === 0)
        {
            return redirect('packages')->with('warning', __('Create a package first'));
        }
        $roles = Role::where('name', '!=', 'admin')
            ->where('name', '!=', 'reseller')
            ->where('name', '!=', 'user')
            ->get();
        $staff = User::role($roles)->orderBy('name')->get();

        if (getSetting('using_service_zone') && $zones->count() === 0 && !auth()->user()->isReseller()){
            return redirect('users')->with('warning', __('Service zone is enabled. Please create a service zone'));
        }

        if (getSetting('using_customer_manager') && $staff->count() === 0 && !auth()->user()->isReseller()){
            return redirect('users')->with('warning', __('Customer manager is enabled. Please add customer manager'));
        }

        if (getSetting("using_mikrotik")) {
            if (!$this->checkMikrotikConnection->checkConnection()) {
                return $this->checkMikrotikConnection->checkConnection();
            }
            $ppp_query = new Query("/ppp/profile/print");
            $ppp_profiles = $this->checkMikrotikConnection->checkConnection()->query($ppp_query)->read();

            $hotspot_query = new Query("/ip/hotspot/user/profile/print");
            $hotspot_profiles = $this->checkMikrotikConnection->checkConnection()->query($hotspot_query)->read();

            return view('admin.users.users-create', compact('packages', 'zones', 'staff', 'services', 'ppp_profiles', 'hotspot_profiles'));
        }

        return view('admin.users.users-create', compact('packages', 'zones', 'staff', 'services'));
    }

    public function store(Request $request)
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
            'birth'      => 'required',
            'invoice'      => 'required'
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
        if (getSetting('using_reseller') && auth()->user()->isReseller()) {
            $user->reseller_id = auth()->id();
        }
        if ($request->has('service_zone_id') && !auth()->user()->isReseller()) {
            $user->service_zone_id = $request->service_zone_id;
        }
        if ($request->has('manager_id') && !auth()->user()->isReseller()) {
            $user->manager_id = $request->manager_id;
        }
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

        if (getSetting("using_stripe")) {

            Mail::to($user)->send(new SubscriptionConfirmed($subscription));
        }

        return redirect('users')->with('success', __('User added successfully'));
    }

    public function show(User $user)
    {
        if (!auth()->user()->can('view-user')) {
            return redirect('dashboard');
        }
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        if (!auth()->user()->can('edit-user')) {
            return redirect('dashboard');
        }
        return view('admin.users.user-edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'password' => 'nullable|min:6|confirmed',
            'phone'    => 'required',
            'address'  => 'required',
            'city'     => 'required',
            'postcode' => 'required|numeric'
        ]);

        if (filled($request->password)) {
            $user->password = bcrypt($request->password);
        }
        $user->customer_id = $request->customer_id;
        $user->company = $request->company;
        $user->phone = $request->phone;
        $user->emergency = $request->emergency;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->postcode = $request->postcode;
        $user->birth = $request->birth;
        $user->save();

        return redirect('users')->with('success', 'User information updated');
    }
}
