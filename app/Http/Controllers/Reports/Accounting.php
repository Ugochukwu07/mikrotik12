<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class Accounting extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        $company = User::role('admin')->first();

        if ($request->income){
            $incomes = Account::with('category')
                ->where('type', 0)
                ->whereYear('created_at', $request->income)
                ->get();

            $pdf = PDF::loadview('admin.report.download.income', compact('company', 'incomes'));
            return $pdf->download( config('app.name') . ' Income Report ' . date('dmY') . ('.pdf'));
        }

        if ($request->expense){
            $expenses = Account::with('category')
                ->where('type', 1)
                ->whereYear('created_at', $request->expense)
                ->get();

            $pdf = PDF::loadview('admin.report.download.expense', compact('company', 'expenses'));
            return $pdf->download( config('app.name') . ' Expense Report ' . date('dmY') . ('.pdf'));
        }
    }
}
