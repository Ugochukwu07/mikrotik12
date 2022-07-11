<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!auth()->user()->can('view-subscription')) {
            return redirect('dashboard');
        }
        return view('admin.subscription.subscription-index');
    }

    public function show(Subscription $subscription)
    {
        if (!auth()->user()->isUser()) {
            return redirect('dashboard');
        }

        $intent = auth()->user()->createSetupIntent();
        return view('user.subscriptions.subscription-show', compact('subscription', 'intent'));
    }
}
