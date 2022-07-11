<div class="w-64 min-h-screen bg-white hidden md:block">
    <nav class="mt-10">
        <div x-data="{ open: false }">

            <x-sidebar-item fa="fa-align-right" :href="route('dashboard')" :active="request()->routeIs('dashboard')">{{ __('Dashboard') }}</x-sidebar-item>
            @if(auth()->user()->can('view-package'))
                <x-sidebar-item fa="fa-gift" :href="route('packages')" :active="request()->routeIs('packages')">{{ __('Packages') }}</x-sidebar-item>
            @endif

            @if(auth()->user()->can('view-user'))
                <x-sidebar-item fa="fa-smile" :href="route('users')" :active="request()->routeIs('users')">{{ __('Users') }}</x-sidebar-item>
            @endif

            @if(getSetting('using_reseller') && auth()->user()->can('view-reseller'))
                <x-sidebar-item fa="fa-user-tie" :href="route('resellers')" :active="request()->routeIs('resellers')">{{ __('Resellers') }}</x-sidebar-item>
            @endif
            @if(getSetting('using_staff') && auth()->user()->isAdmin())
                <x-sidebar-item fa="fa-headset" :href="route('staff')" :active="request()->routeIs('staff')">{{ __('Staff') }}</x-sidebar-item>
            @endif

            @if(auth()->user()->can('view-subscription'))
                <x-sidebar-item fa="fa-file-invoice-dollar" :href="route('subscriptions')" :active="request()->routeIs('subscriptions')">{{ __('Billing') }}</x-sidebar-item>
            @endif
            @if(auth()->user()->can('view-payment'))
                <x-sidebar-item fa="fa-credit-card" :href="route('payments')" :active="request()->routeIs('payments')">{{ __('Payments') }}</x-sidebar-item>
            @endif
            @if(auth()->user()->can('view-accounting'))
                <x-sidebar-item fa="fa-dollar-sign" :href="route('account')" :active="request()->routeIs('account')">{{ __('Accounting') }}</x-sidebar-item>
            @endif

            @if(getSetting('using_mikrotik') && auth()->user()->can('view-mikrotik'))
                <x-sidebar-item fa="fa-microchip" :href="route('mikrotik')" :active="request()->routeIs('mikrotik')">{{ __('Mikrotik') }}</x-sidebar-item>
            @endif
            @if(auth()->user()->can('view-report'))
                <x-sidebar-item fa="fa-clipboard" :href="route('report')" :active="request()->routeIs('report')">{{ __('Report') }}</x-sidebar-item>
            @endif

            @if(auth()->user()->can('view-ticket'))
                <x-sidebar-item fa="fa-bell" :href="route('tickets')" :active="request()->routeIs('tickets')">{{ __('Tickets') }}</x-sidebar-item>
            @endif
            @if(getSetting('using_service_zone') && auth()->user()->can('view-service-zone'))
                <x-sidebar-item fa="fa-map-marker" :href="route('service-zone')" :active="request()->routeIs('service-zone')">{{ __('Service zone') }}</x-sidebar-item>
            @endif
            @if(getSetting('using_staff') && auth()->user()->isAdmin())
                <x-sidebar-item fa="fa-user-lock" :href="route('roles')" :active="request()->routeIs('roles')">{{ __('Roles') }}</x-sidebar-item>
            @endif
            <x-sidebar-item fa="fa-user-circle" :href="route('profile')" :active="request()->routeIs('profile')">{{ __('Profile') }}</x-sidebar-item>
            @if(auth()->user()->isAdmin())
                <x-sidebar-item fa="fa-cog" :href="route('settings')" :active="request()->routeIs('settings')">{{ __('Settings') }}</x-sidebar-item>
            @endif
        </div>
    </nav>
</div>
