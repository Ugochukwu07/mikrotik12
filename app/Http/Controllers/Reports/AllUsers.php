<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;

class AllUsers extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        $company = User::role('admin')->first();

        if (!$request->reseller_id && !$request->service_zone && !$request->manager){
            $users = User::role('user')->get();
        }

        if ($request->reseller_id){
            $users = User::role('user')->where('reseller_id', $request->reseller_id)->get();
        }

        if ($request->service_zone){
            $users = User::role('user')->where('service_zone_id', $request->service_zone)->get();
        }

        if ($request->manager){
            $users = User::role('user')->where('manager_id', $request->manager)->get();
        }

        $pdf = PDF::loadview('admin.report.download.all-users', compact('company', 'users'));
        return $pdf->download( config('app.name') . ' User Report ' . date('dmY') . ('.pdf'));

    }
}
