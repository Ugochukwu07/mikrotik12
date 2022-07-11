<?php

namespace App\Http\Controllers\Mikrotik;

use App\Classes\Mikrotik;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RouterOS\Query;

class DefaultConfig extends Controller
{
    protected Mikrotik $checkMikrotikConnection;

    public function __construct()
    {
        $this->middleware('auth');
        $this->checkMikrotikConnection = new Mikrotik();
    }

    public function __invoke(Request $request)
    {
        if (!$this->checkMikrotikConnection->checkConnection()) {
            return $this->checkMikrotikConnection->checkConnection();
        }

        $query = new Query("/system/default-configuration/print");
        $config = $this->checkMikrotikConnection->checkConnection()->query($query)->read();

        return view('admin.mikrotik.functions.default-config', compact('config'));
    }
}
