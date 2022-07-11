<?php

namespace App\Http\Controllers\Invokable;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Subscription;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ResellerPaymentStore extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        $subscription = Subscription::firstWhere('id', $request->subscription_id);

        $subscription->update([
            'payment_status' => 1
        ]);

        $payment = new Payment();
        $payment->payment_method_id = 5;
        $payment->note = $request->note;
        $payment->invoice = $subscription->invoice;
        $payment->package_name = $subscription->package_name;
        $payment->package_start = $subscription->created_at;
        $payment->package_end = $subscription->subscription_expires;
        $payment->user_id = $request->user_id;
        $payment->approve = 1;
        $payment->created_by = auth()->id();
        $payment->reseller_price = $subscription->reseller_price ?: 0;
        $payment->save();

        $transactions = new Transaction();
        $transactions->invoice = $subscription->invoice;
        $transactions->amount = $subscription->reseller_price ?: 0;
        $transactions->type = 1;
        $transactions->user_id = $payment->user_id;
        $transactions->created_by = auth()->id();
        $transactions->save();

        return redirect('payments')->with('success', 'Payment added successfully');
    }
}
