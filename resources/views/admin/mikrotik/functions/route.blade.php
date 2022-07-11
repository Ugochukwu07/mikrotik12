<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <x-card-title title="{{ __('Mikrotik IP routes') }}"></x-card-title>

                <div class="p-6">
                    <div class="mx-auto">
                        <div class="mt-2">
                            @foreach($routes as $route)
                                <ul class="mb-10">
                                    <li>{{ __('dst-address:') }} <span class="ml-2"> {{ $route['dst-address'] ?? '' }}</span>
                                    <li>{{ __('pref-srcs:') }} <span class="ml-2"> {{ $route['pref-src'] ?? '' }}</span>
                                    <li>{{ __('gateway:') }} <span class="ml-2"> {{ $route['gateway'] ?? '' }}</span>
                                    <li>{{ __('gateway-status:') }} <span class="ml-2"> {{ $route['gateway-status'] ?? '' }}</span>
                                    <li>{{ __('distance:') }} <span class="ml-2"> {{ $route['distance'] ?? '' }}</span>
                                    <li>{{ __('scope:') }} <span class="ml-2"> {{ $route['scope'] ?? '' }}</span>
                                    <li>{{ __('target-scope:') }} <span class="ml-2"> {{ $route['target-scope'] ?? '' }}</span>
                                    <li>{{ __('vrf-interface:') }} <span class="ml-2"> {{ $route['vrf-interface'] ?? '' }}</span>
                                    <li>{{ __('active:') }} <span class="ml-2"> {{ $route['active'] ?? '' }}</span>
                                    <li>{{ __('dynamic:') }} <span class="ml-2"> {{ $route['dynamic'] ?? '' }}</span>
                                    <li>{{ __('static:') }} <span class="ml-2"> {{ $route['static'] ?? '' }}</span>
                                    <li>{{ __('connect:') }} <span class="ml-2"> {{ $route['connect'] ?? '' }}</span>
                                    <li>{{ __('disabled:') }} <span class="ml-2"> {{ $route['disabled'] ?? '' }}</span>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
