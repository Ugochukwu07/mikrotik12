<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <style>
        body {
            font-family: arial, sans-serif;
        }

        h3 {
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        td, th {
            text-align: left;
            padding: 8px;
        }
    </style>
</head>
<body>
<h1>{{ __('INVOICE') }}</h1>
<div>
    <strong>{{ $company->company }}</strong>
</div>
<div>{{ $company->address }}</div>
<div>{{ $company->city . ' ' . $company->postcode }}</div>
<div>{{ $company->phone }}</div>
<table>
    <tr>
        <th>{{ __('Bill to') }}</th>
        <th>{{ __('') }}</th>
    </tr>
    <tr>
        <td>
            <strong>{{ $invoice->user->name }}</strong>
            <address>
                {{ $invoice->user->address }}<br>
                {{ $invoice->user->city . ' ' . $invoice->user->postcode }}<br>
                {{ $invoice->user->email }}<br>
                {{ $invoice->user->phone }}
            </address>
        </td>
        <td>
            <div>
                <strong>{{ __('Invoice #') . $invoice->invoice }}</strong>
            </div>
            <div>{{ __('Created by: ') . $invoice->createdBy->name }}</div>
            <div>{{ __('Created on: ') . date('Y-m-d', strtotime($invoice->created_at)) }}</div>
            <div>{{ __('Created due: ') . date('Y-m-d', strtotime($invoice->payment_last_day)) }}</div>
            <div>
                @if($invoice->user->reseller_id)
                    {{ __('Reseller: ') . $invoice->user->reseller->name }}
                @endif
            </div>
        </td>
    </tr>
</table>

<table>
    <tr>
        <th>{{ __('Package') }}</th>
        <th>{{ __('Duration') }}</th>
        <th>{{ __('Total') }}</th>
    </tr>
    <tr>
        <td class="left">{{ $invoice->package_name }}</td>
        <td class="left">
            {{ date('Y-m-d', strtotime($invoice->created_at)) }} <br>
            {{ date('Y-m-d', strtotime($invoice->subscription_expires)) }}
        </td>
        <td class="right">{{ config('app.currency') . __(' ') . ($invoice->user_price + $invoice->reseller_price) }}</td>
    </tr>
</table>
</body>
</html>
