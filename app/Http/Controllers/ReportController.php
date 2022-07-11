<?php

namespace App\Http\Controllers;

use App\Models\ServiceZone;
use App\Models\User;
use DB;
use Spatie\Permission\Models\Role;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!auth()->user()->can('view-report')) {
            return redirect('dashboard');
        }

        $roles = Role::where('name', '!=', 'admin')
            ->where('name', '!=', 'reseller')
            ->where('name', '!=', 'user')
            ->get();

        $resellers = User::role('reseller')->get();
        $zones = ServiceZone::orderBy('name')->get();
        $managers = User::role($roles)->get();

        $years_income = DB::table('accounts')
            ->selectRaw('YEAR(created_at) as year')
            ->orderBy('year', 'asc')
            ->where('type', 0)
            ->distinct()
            ->get();

        $years_expense = DB::table('accounts')
            ->selectRaw('YEAR(created_at) as year')
            ->orderBy('year', 'asc')
            ->where('type', 1)
            ->distinct()
            ->get();

        $years_billing = DB::table('subscriptions')
            ->selectRaw('YEAR(created_at) as year')
            ->orderBy('year', 'asc')
            ->distinct()
            ->get();

        $years_payment = DB::table('payments')
            ->selectRaw('YEAR(created_at) as year')
            ->orderBy('year', 'asc')
            ->distinct()
            ->get();

        return view('admin.report.report-index',
            compact('resellers', 'zones', 'managers', 'years_income', 'years_expense', 'years_billing', 'years_payment')
        );
    }
}
