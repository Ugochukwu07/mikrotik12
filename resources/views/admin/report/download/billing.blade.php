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

<h3>{{ __('User Billing Report') }}</h3>

<table>
    <tr>
        <th>{{ __('Invoice') }}</th>
        <th>{{ __('User') }}</th>
        <th>{{ __('Package') }}</th>
        <th>{{ __('Amount') }}</th>
        <th>{{ __('Duration') }}</th>
    </tr>
    @foreach($billings as $bill)
        <tr>
            <td>{{ $bill->invoice }}</td>
            <td>{{ $bill->user->name }}</td>
            <td>{{ $bill->package->name }}</td>
            <td>{{ config('app.currency') . __(' ') . ($bill->user_price + $bill->reseller_price) }}</td>
            <td>
                {{ date('Y-m-d', strtotime($bill->created_at)) }} <br>
                {{ date('Y-m-d', strtotime($bill->subscription_expires)) }}
            </td>
        </tr>
    @endforeach
</table>
</body>
</html>
