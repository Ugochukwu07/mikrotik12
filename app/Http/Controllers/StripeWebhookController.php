<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StripeWebhookController extends Controller
{
    public function handle(Request $request)
    {
        $payload = $request->all();

        if($payload['type'] === 'checkout.session.async_payment_succeeded')
        {
            $customer = $payload['data']['object']['customer'];
        }

        $settings = Settings::firstOrFail();

        $user = User::firstWhere('stripe_id', $customer);

        if ($user->subscription->payment_status === 0) {
            $user->subscription->update([
                'payment_status' => 1
            ]);
        }

        if ($user->subscription->payment_status === 1) {
            $user->subscription->update([
                'subscription_expires' => Carbon::parse($user->subscription_expires)
                    ->addDays($settings->package_expires_in),
            ]);
        }

        return view('user.payment.success');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
