<?php

namespace App\Http\Controllers\Invokable;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Subscription;
use App\Models\Transaction;
use Illuminate\Http\Request;

class StripePaymentStore extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request, $id)
    {
        $subscription = Subscription::findOrFail($id);
        $user = $request->user();
        $amount = 0;

        if (!$user->reseller_id) {
            $amount = $subscription->user_price;
        }

        if ($user->reseller_id) {
            $amount = $subscription->reseller_price;
        }

        try {
            $user->createOrGetStripeCustomer();
            $user->updateDefaultPaymentMethod($request->paymentMethod);
            $user->charge($amount * 100, $request->paymentMethod);
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }

        $subscription->update([
            'payment_status' => 1
        ]);

        $payment = new Payment();
        $payment->payment_method_id = 4;
        $payment->invoice = $subscription->invoice;
        $payment->package_name = $subscription->package_name;
        $payment->package_start = $subscription->created_at;
        $payment->package_end = $subscription->subscription_expires;
        $payment->user_id = $user->id;
        $payment->approve = 1;
        $payment->created_by = auth()->id();
        if (!$user->reseller_id) {
            $payment->user_price = $subscription->user_price;
        }

        if ($user->reseller_id) {
            $payment->reseller_price = $subscription->reseller_price;
        }
        $payment->save();

        $transactions = new Transaction();
        $transactions->invoice = $subscription->invoice;
        if (!$user->reseller_id) {
            $transactions->amount = $subscription->user_price;
        }
        if ($user->reseller_id) {
            $transactions->amount = $subscription->reseller_price;
        }
        $transactions->type = 1;
        $transactions->user_id = $user->id;
        $transactions->created_by = $user->id;
        $transactions->save();

        return redirect('payments')->with('success', __('Payment added successfully'));
    }
}
