<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class BillInvoice extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        $company = User::role('admin')->first();
        $invoice = Subscription::with(['user', 'createdBy'])
            ->where('invoice', $request->invoice)
            ->firstOrFail();

        $pdf = PDF::loadview('admin.subscription.invoice-download', compact('company', 'invoice'));
        return $pdf->download(config('app.name') . ' Billing Invoice ' . date('dmY') . ('.pdf'));
    }
}
