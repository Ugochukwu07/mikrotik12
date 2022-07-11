<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Stripe\Customer;

class StripeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user = User::with(['profile', 'subscription'])->where('id', auth()->id())->firstOrFail();
        $amount = ($user->subscription->package_price + $user->subscription->reseller_cut) * 100;

        Stripe::setApiKey(env('STRIPE_SECRET'));

        header('Content-Type: application/json');

        $checkout_session = Session::create([
            'customer' => $user->stripe_id,
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => env('currency'),
                    'unit_amount' => $amount,
                    'product_data' => [
                        'name' => $user->subscription->package_name,
                    ],
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('cancel'),
        ]);

        return response()->json([ 'id' =>$checkout_session->id]);
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
