<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class UserPayment extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        $company = User::role('admin')->first();
        $payments = Payment::with(['user', 'createdBy'])
            ->whereYear('created_at', $request->payment)
            ->get();

        $pdf = PDF::loadview('admin.report.download.payment', compact('company', 'payments'));
        return $pdf->download(config('app.name') . ' User Payment Report ' . date('dmY') . ('.pdf'));
    }
}
