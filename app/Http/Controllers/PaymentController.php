<?php

namespace App\Http\Controllers;

use App\Mail\PaymentConfirmed;
use App\Models\Payment;
use App\Models\Subscription;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!auth()->user()->can('view-payment')) {
            return redirect('dashboard');
        }

        return view('admin.payments.payment-index');
    }

    public function create()
    {
        if (!auth()->user()->can('create-payment')) {
            return redirect('dashboard');
        }

        return view('admin.payments.payment-create');
    }

    public function store(Request $request)
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
        if (!$subscription->user->reseller_id)
        {
            $payment->user_price = $subscription->user_price ?: 0;
        }
        if ($subscription->user->reseller_id)
        {
            $payment->reseller_price = $subscription->reseller_price ?: 0;
        }
        $payment->user_id = $request->user_id;
        $payment->approve = 0;
        $payment->created_by = auth()->id();
        $payment->save();

        $transactions = new Transaction();
        $transactions->invoice = $subscription->invoice;
        if (!$subscription->user->reseller_id)
        {
            $transactions->amount = $subscription->user_price ?: 0;
        }
        if ($subscription->user->reseller_id)
        {
            $transactions->amount = $subscription->reseller_price ?: 0;
        }
        $transactions->type = 1;
        $transactions->user_id = $payment->user_id;
        $transactions->created_by = auth()->id();
        $transactions->save();

        if (getSetting("using_stripe")) {

            Mail::to($payment->user)->send(new PaymentConfirmed($payment));
        }

        

        return redirect('payments')->with('success', __('Payment added successfully'));
    }
}
