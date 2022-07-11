@component('mail::message')
# {{ __('Hi ') }} {{ $payment->user->name }} {{ __(',') }}

{{ __('Greetings from ') . config('app.name') . __('.') }}

{{ __('Your payment for the package ') . $payment->package_name . __(' has been successfully added. Your package will expire on ') . (date('Y-m-d', strtotime($payment->package_end))) . __('.') }}

{{ __('Thank you for being with us.') }}

@component('mail::button', ['url' => route('payments')])
    {{ __('Download Invoice ') }}
@endcomponent

{{ __('Thanks,') }}<br>
{{ config('app.name') }}
@endcomponent
