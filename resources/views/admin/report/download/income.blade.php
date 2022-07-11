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

<h3>{{ __('Income Report') }}</h3>

<table>
    <tr>
        <th>{{ __('Item') }}</th>
        <th>{{ __('Amount') }}</th>
        <th>{{ __('Category') }}</th>
        <th>{{ __('Date') }}</th>
    </tr>
    @foreach($incomes as $income)
        <tr>
            <td>{{ $income->item }}</td>
            <td>{{ config('app.currency') . __(' ') . $income->amount }}</td>
            <td>{{ $income->category->name }}</td>
            <td>{{ date('Y-m-d', strtotime($income->created_at)) }}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
