<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class UserBilling extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        $company = User::role('admin')->first();
        $billings = Subscription::with(['user', 'createdBy', 'package'])
            ->whereYear('created_at', $request->billing)
            ->get();

        $pdf = PDF::loadview('admin.report.download.billing', compact('company', 'billings'));
        return $pdf->download(config('app.name') . ' User Billing Report ' . date('dmY') . ('.pdf'));
    }
}
