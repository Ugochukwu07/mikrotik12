@component('mail::message')
# {{ __('Hi ') }} {{ $subscription->user->name }} {{ __(',') }}

{{ __('Greetings from ') . config('app.name') . __('.') }}

{{ __('Your subscription for the package ') . $subscription->package_name . __(' has been confirmed till ') . (date('Y-m-d', strtotime($subscription->subscription_expires))) . __('.') }}

{{ __('To stay connected, please pay before ') . (date('Y-m-d', strtotime($subscription->payment_last_day))) . __('.') }}

@component('mail::button', ['url' => route('subscriptions')])
    {{ __('Download Invoice ') }}
@endcomponent


{{ __('Thanks,') }}<br>
{{ config('app.name') }}
@endcomponent
