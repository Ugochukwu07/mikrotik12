<?php

namespace App\Http\Controllers\Invokable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResellerPaymentCreate extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        return view('reseller.payments.payment-create');
    }
}
