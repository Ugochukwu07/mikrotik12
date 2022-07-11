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

<h3>{{ __('Customer Information') }}</h3>

<table>
    <tr>
        <th>{{ __('Name') }}</th>
        <th>{{ __('Contact') }}</th>
        <th>{{ __('Address') }}</th>
        @if(getSetting('using_reseller'))
            <th>{{ __('Reseller') }}</th>
        @endif
        @if(getSetting('using_staff'))
            <th>{{ __('Manager') }}</th>
        @endif
        @if(getSetting('using_service_zone'))
            <th>{{ __('Service zone') }}</th>
        @endif
    </tr>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>
                {{ $user->email }}<br>
                {{ $user->phone }}
            </td>
            <td>
                <address>
                    {{ $user->address }}<br>
                    {{ $user->city . __(', ') . $user->postcode }}
                </address>
            </td>
            @if(getSetting('using_reseller'))
                <th>{{ $user->reseller->name ?? __('N/A') }}</th>
            @endif
            @if(getSetting('using_staff'))
                <th>{{ $user->manager->name ?? __('N/A') }}</th>
            @endif
            @if(getSetting('using_service_zone'))
                <th>{{ $user->serviceZone->name ?? __('N/A') }}</th>
            @endif
        </tr>
    @endforeach
</table>

</body>
</html>
