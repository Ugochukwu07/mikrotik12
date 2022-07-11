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
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>
</head>
<body>
<p>{{ date('Y-m-d') }}</p>
<address>
    {{ $company->company }}<br>
    {{ $company->address }}<br>
    {{ $company->city }}<br>
    {{ $company->postcode }}<br>
    {{ $company->phone }}
</address>

<h3>{{ __('User Payment Report') }}</h3>

<table>
    <tr>
        <th>{{ __('Invoice') }}</th>
        <th>{{ __('User') }}</th>
        <th>{{ __('Package') }}</th>
        <th>{{ __('Amount') }}</th>
        <th>{{ __('Duration') }}</th>
    </tr>
    @foreach($payments as $payment)
        <tr>
            <td>{{ $payment->invoice }}</td>
            <td>{{ $payment->user->name }}</td>
            <td>{{ $payment->package->name }}</td>
            <td>{{ config('app.currency') . __(' ') . ($payment->user_price + $payment->reseller_price) }}</td>
            <td>
                {{ date('Y-m-d', strtotime($payment->package_start)) }} <br>
                {{ date('Y-m-d', strtotime($payment->package_end)) }}
            </td>
        </tr>
    @endforeach
</table>
</body>
</html>
