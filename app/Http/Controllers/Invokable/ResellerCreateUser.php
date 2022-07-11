<?php

namespace App\Http\Controllers\Invokable;

use App\Classes\Mikrotik;
use App\Http\Controllers\Controller;
use App\Models\MikrotikService;
use App\Models\Package;
use App\Models\ServiceZone;
use App\Models\User;
use Illuminate\Http\Request;
use RouterOS\Query;
use Spatie\Permission\Models\Role;

class ResellerCreateUser extends Controller
{
    protected Mikrotik $checkMikrotikConnection;

    public function __construct()
    {
        $this->middleware('auth');
        $this->checkMikrotikConnection = new Mikrotik();
    }

    public function __invoke(Request $request)
    {
        $services = MikrotikService::orderBy('name')->get();
        $packages = Package::where('status', 1)->orderBy('name')->get();
        if($packages->count() === 0)
        {
            return redirect('users')->with('warning', __('Create a package first'));
        }

        if (getSetting("using_mikrotik")) {
            if (!$this->checkMikrotikConnection->checkConnection()) {
                return $this->checkMikrotikConnection->checkConnection();
            }
            $ppp_query = new Query("/ppp/profile/print");
            $ppp_profiles = $this->checkMikrotikConnection->checkConnection()->query($ppp_query)->read();

            $hotspot_query = new Query("/ip/hotspot/user/profile/print");
            $hotspot_profiles = $this->checkMikrotikConnection->checkConnection()->query($hotspot_query)->read();

            return view('reseller.users.user-create', compact('packages', 'services', 'ppp_profiles', 'hotspot_profiles'));
        }

        return view('reseller.users.user-create', compact('packages', 'services'));
    }
}
