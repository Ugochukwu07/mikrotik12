<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Subscription;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class PaymentReceipt extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        $company = User::role('admin')->first();
        $invoice = Payment::with(['user', 'createdBy'])
            ->where('invoice', $request->invoice)
            ->firstOrFail();

        $pdf = PDF::loadview('admin.payments.invoice-download', compact('company', 'invoice'));
        return $pdf->download(config('app.name') . ' Payment Invoice ' . date('dmY') . ('.pdf'));
    }
}
