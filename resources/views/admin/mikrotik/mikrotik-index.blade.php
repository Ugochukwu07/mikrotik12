<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <section class="container px-6 mx-auto">
                <div class="grid gap-6 mb-8 md:grid-cols-3 lg:grid-cols-4">
                    <div class="flex items-center p-4 bg-white rounded-md">
                        <a href="{{ route('mk-system-resource') }}" class="ml-4 underline">{{ __('System resource') }}</a>
                    </div>
                    <div class="flex items-center p-4 bg-white rounded-md">
                        <a href="{{ route('mk-route') }}" class="ml-4 underline">{{ __('IP routes') }}</a>
                    </div>
                    <div class="flex items-center p-4 bg-white rounded-md">
                        <a href="{{ route('mk-clock') }}" class="ml-4 underline">{{ __('System clock') }}</a>
                    </div>
                    <div class="flex items-center p-4 bg-white rounded-md">
                        <a href="{{ route('mk-interface') }}" class="ml-4 underline">{{ __('Interfaces') }}</a>
                    </div>

                    <div class="flex items-center p-4 bg-white rounded-md">
                        <a href="{{ route('mk-license') }}" class="ml-4 underline">{{ __('License') }}</a>
                    </div>
                    <div class="flex items-center p-4 bg-white rounded-md">
                        <a href="{{ route('mk-package') }}" class="ml-4 underline">{{ __('Packages') }}</a>
                    </div>
                    <div class="flex items-center p-4 bg-white rounded-md">
                        <a href="{{ route('mk-admin') }}" class="ml-4 underline">{{ __('Mikrotik users') }}</a>
                    </div>
                    <div class="flex items-center p-4 bg-white rounded-md">
                        <a href="{{ route('mk-active-user') }}" class="ml-4 underline">{{ __('Mikrotik active users') }}</a>
                    </div>

                    <div class="flex items-center p-4 bg-white rounded-md">
                        <a href="{{ route('mk-ppp-users') }}" class="ml-4 underline">{{ __('PPP users') }}</a>
                    </div>
                    <div class="flex items-center p-4 bg-white rounded-md">
                        <a href="{{ route('mk-ppp-active') }}" class="ml-4 underline">{{ __('PPP active users') }}</a>
                    </div>
                    <div class="flex items-center p-4 bg-white rounded-md">
                        <a href="{{ route('mk-hotspot-users') }}" class="ml-4 underline">{{ __('HotSpot users') }}</a>
                    </div>
                    <div class="flex items-center p-4 bg-white rounded-md">
                        <a href="{{ route('mk-hotspot-active') }}" class="ml-4 underline">{{ __('HotSpot active users') }}</a>
                    </div>

                    <div class="flex items-center p-4 bg-white rounded-md">
                        <a href="{{ route('mk-ppp-profile') }}" class="ml-4 underline">{{ __('PPP profiles') }}</a>
                    </div>
                    <div class="flex items-center p-4 bg-white rounded-md">
                        <a href="{{ route('mk-hotspot-profile') }}" class="ml-4 underline">{{ __('HotSpot profiles') }}</a>
                    </div>
                    <div class="flex items-center p-4 bg-white rounded-md">
                        <a href="{{ route('mk-add') }}" class="ml-4 underline">{{ __('IP address') }}</a>
                    </div>
                    <div class="flex items-center p-4 bg-white rounded-md">
                        <a href="{{ route('mk-ntp-client') }}" class="ml-4 underline">{{ __('NTP client') }}</a>
                    </div>

                    <div class="flex items-center p-4 bg-white rounded-md">
                        <a href="{{ route('mk-firewall-rules') }}" class="ml-4 underline">{{ __('Firewall filters') }}</a>
                    </div>
                    <div class="flex items-center p-4 bg-white rounded-md">
                        <a href="{{ route('mk-firewall-nat') }}" class="ml-4 underline">{{ __('Firewall NAT') }}</a>
                    </div>
                    <div class="flex items-center p-4 bg-white rounded-md">
                        <a href="{{ route('mk-firewall-service-port') }}" class="ml-4 underline">{{ __('Firewall service port') }}</a>
                    </div>
                    <div class="flex items-center p-4 bg-white rounded-md">
                        <a href="{{ route('mk-firewall-address-list') }}" class="ml-4 underline">{{ __('Firewall address list') }}</a>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
