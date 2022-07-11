<?php

namespace App\Http\Controllers;

use App\Classes\Mikrotik;
use App\Models\Package;
use App\View\Components\badge;
use Illuminate\Http\Request;
use RouterOS\Client;
use RouterOS\Exceptions\ClientException;
use RouterOS\Exceptions\ConfigException;
use RouterOS\Exceptions\QueryException;
use RouterOS\Query;

class PackageController extends Controller
{
    protected Mikrotik $checkMikrotikConnection;

    public function __construct()
    {
        $this->middleware("auth");
        $this->checkMikrotikConnection = new Mikrotik();
    }

    public function index()
    {
        if (!auth()->user()->can('view-package')) {
            return redirect('dashboard');
        }
        return view("admin.package.package-index");
    }

    public function create()
    {
        if (!auth()->user()->can('create-package')) {
            return redirect('dashboard');
        }
        return view("admin.package.package-create");

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "name"           => "required|string",
            "bandwidth"      => "required|string",
            "user_price"     => "numeric",
            "reseller_price" => "numeric",
        ]);

        if (getSetting("using_mikrotik")) {
            if (!$this->checkMikrotikConnection->checkConnection()) {
                return $this->checkMikrotikConnection->checkConnection();
            }

            if ($request->type == 1) {
                $query = new Query("/ppp/profile/add");
                $query->equal("name", $request->name);

                $this->checkMikrotikConnection
                    ->checkConnection()
                    ->query($query)
                    ->read();
            }

            if ($request->type == 0) {
                $query = new Query("/ip/hotspot/user/profile/add");
                $query->equal("name", $request->name);

                $this->checkMikrotikConnection
                    ->checkConnection()
                    ->query($query)
                    ->read();
            }
        }

        $package = new Package();
        $package->name = $request->name;
        $package->bandwidth = $request->bandwidth;
        $package->user_price = $request->user_price ?: 0;
        $package->reseller_price = $request->reseller_price ?: 0;
        if (!$request->has('type')) {
            $package->type = 2;
        }
        if ($request->has('type')) {
            $package->type = $request->type;
        }

        $package->status = 1;
        $package->save();

        return redirect("/packages")->with("success", __("New package added"));
    }

    public function show(Package $package)
    {
        return view("admin.package.show", compact("package"));
    }

    public function edit(Package $package)
    {
        if (!auth()->user()->can('edit-package')) {
            return redirect('dashboard');
        }
        return view("admin.package.package-edit", compact("package"));
    }

    public function update(Request $request, Package $package)
    {
        $this->validate($request, [
            "bandwidth"      => "required|string",
            "user_price"     => "numeric",
            "reseller_price" => "numeric",
        ]);

        $package->bandwidth = $request->bandwidth;
        $package->user_price = $request->user_price ?: $package->user_price;
        $package->reseller_price = $request->reseller_price ?: $package->reseller_price;
        $package->save();

        return redirect("/packages")->with("success", __('Package updated'));
    }
}
