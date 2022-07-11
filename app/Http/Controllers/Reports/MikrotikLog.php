<?php

namespace App\Http\Controllers\Reports;

use App\Classes\Mikrotik;
use App\Http\Controllers\Controller;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use RouterOS\Query;

class MikrotikLog extends Controller
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

        $company = User::role('admin')->first();
        $query = new Query("/log/print");
        $data = $this->checkMikrotikConnection->checkConnection()->query($query)->read();
        $logs = $this->paginate($data);
        $logs->setPath('/admin/report/1/edit');

        $pdf = PDF::loadview('admin.report.download.log', compact('company', 'logs'));
        return $pdf->download(config('app.name') . ' Mikrotik Log ' . date('dmY') . ('.pdf'));
    }

    private function paginate($items, $perPage = 50, $page = null, $options = [])
    {
        $page = $page ?? (Paginator::resolveCurrentPage() ?? 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
