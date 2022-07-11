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

<h3>{{ __('Mikrotik Log Report') }}</h3>

<table>
    <tr>
        <th>{{ __('Time') }}</th>
        <th>{{ __('Topics') }}</th>
        <th>{{ __('Message') }}</th>
    </tr>
    @foreach($logs as $log)
        <tr>
            <td>{{ $log['time'] }}</td>
            <td>{{ $log['topics'] }}</td>
            <td>{{ $log['message'] }}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
