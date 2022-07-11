<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (auth()->user()->isUser())
        {
            $subscription = Subscription::where('user_id', auth()->id())->whereMonth('created_at', date('m'))->get();
            $bill = $subscription->sum('user_price') + $subscription->sum('reseller_price');
            $payment = $subscription->where('payment_status', 1)->sum('user_price')
                + $subscription->where('payment_status', 1)->sum('reseller_price');

            $my_subscription = Subscription::where('user_id', auth()->id())->get();
            $my_bill = $my_subscription->sum('user_price') + $subscription->sum('reseller_price');
            $my_payment = $my_subscription->where('payment_status', 1)->sum('user_price')
                + $my_subscription->where('payment_status', 1)->sum('reseller_price');

            $my_tickets = Ticket::where('user_id', auth()->id())->count();
            $my_open_tickets = Ticket::where('user_id', auth()->id())->where('status', 1)->count();

            return view('user.dashboard.is-active', compact('bill', 'payment', 'my_bill', 'my_payment', 'my_tickets', 'my_open_tickets'));
        }

        $users = User::role('user')->get();
        if (!auth()->user()->isReseller() && !auth()->user()->isUser()) {
            $total_users = $users->count();
            $active_users = $users->where('status', 1)->count();
            $expired_users = $users->where('status', 2)->count();
        }
        if (auth()->user()->isReseller()) {
            $total_users = $users->where('reseller_id', auth()->id())->count();
            $active_users = $users->where('status', 1)->where('reseller_id', auth()->id())->count();
            $expired_users = $users->where('status', 2)->where('reseller_id', auth()->id())->count();
        }

        $subscriptions = Subscription::where('user_status', 1)
            ->whereMonth('created_at', date('m'))
            ->get();
        if (!auth()->user()->isReseller() && !auth()->user()->isUser()) {
            $total_bill = $subscriptions->sum('user_price') + $subscriptions->sum('reseller_price');
            $total_payment = $subscriptions->where('payment_status', 1)->sum('user_price')
                + $subscriptions->where('payment_status', 1)->sum('reseller_price');
        }
        $reseller_subscription = Subscription::where('user_status', 1)
            ->whereHas('user', function (Builder $builder) {
                $builder->where('reseller_id', auth()->id());
            })
            ->whereMonth('created_at', date('m'))
            ->get();
        if (auth()->user()->isReseller()) {
            $total_bill = $reseller_subscription->sum('reseller_price');
            $total_payment = $reseller_subscription->where('payment_status', 1)->sum('reseller_price');
        }

        $tickets = Ticket::all();
        if (!auth()->user()->isReseller() && !auth()->user()->isUser()) {
            $all_tickets = $tickets->count();
            $open_tickets = $tickets->where('status', 1)->count();
        }
        $resesller_tickets = Ticket::whereHas('user', function (Builder $builder) {
                $builder->where('reseller_id', auth()->id());
            })->get();
        if (auth()->user()->isReseller()) {
            $all_tickets = $resesller_tickets->count();
            $open_tickets = $resesller_tickets->where('status', 1)->count();
        }

        return view('admin.dashboard.dashboard-index', compact(
            'total_users',
            'active_users',
            'expired_users',
            'total_bill',
            'total_payment',
            'all_tickets',
            'open_tickets',
        ));
    }
}
