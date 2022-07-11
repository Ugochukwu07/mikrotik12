<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <x-card-title title="{{ __('Mikrotik HotSpot profiles') }}"></x-card-title>

                <div class="p-6">
                    <div class="mx-auto">
                        <div class="mt-2">
                            @foreach($users as $user)
                                <ul class="mb-10">
                                    <li>{{ __('ID:') }} <span class="ml-2"> {{ $user['.id'] ?? '' }}</span>
                                    <li>{{ __('Name:') }} <span class="ml-2"> {{ $user['name'] ?? '' }}</span>
                                    <li>{{ __('HotSpot address:') }} <span class="ml-2"> {{ $user['hotspot-address'] ?? '' }}</span>
                                    <li>{{ __('DNS name:') }} <span class="ml-2"> {{ $user['dns-name'] ?? '' }}</span>
                                    <li>{{ __('Rate limit:') }} <span class="ml-2"> {{ $user['rate-limit'] ?? '' }}</span>
                                    <li>{{ __('HTTP proxy:') }} <span class="ml-2"> {{ $user['http-proxy'] ?? '' }}</span>
                                    <li>{{ __('SMTP server:') }} <span class="ml-2"> {{ $user['smtp-server'] ?? '' }}</span>
                                    <li>{{ __('Login by:') }} <span class="ml-2"> {{ $user['login-by'] ?? '' }}</span>
                                    <li>{{ __('HTTP cookie lifetime:') }} <span class="ml-2"> {{ $user['http-cookie-lifetime'] ?? '' }}</span>
                                    <li>{{ __('Use Radius:') }} <span class="ml-2"> {{ $user['use-radius'] ?? '' }}</span>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
