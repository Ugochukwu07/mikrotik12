<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use App\Models\Subscription;
use Carbon\Carbon;


class SuccessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $settings = Settings::firstOrFail();

        $user = Subscription::where('user_id', auth()->id())
            ->firstOrFail();

        if ($user->payment_status === 0)
        {
            $user->update(['payment_status' => 1]);
        }

        if ($user->payment_status === 1)
        {
            $user->update([
                'payment_status' => 1,
                'subscription_expires' => Carbon::parse($user->subscription_expires)
                    ->addDays($settings->package_expires_in),
            ]);
        }

        return view('user.payment.success');
    }
}
