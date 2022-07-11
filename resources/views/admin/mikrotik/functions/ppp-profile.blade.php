<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <x-card-title title="{{ __('Mikrotik PPP profiles') }}"></x-card-title>

                <div class="p-6">
                    <div class="mx-auto">
                        <div class="mt-2">
                            @foreach($users as $user)
                                <ul class="mb-10">
                                    <li>{{ __('ID:') }} <span class="ml-2"> {{ $user['.id'] ?? '' }}</span>
                                    <li>{{ __('Name:') }} <span class="ml-2"> {{ $user['name'] ?? '' }}</span>
                                    <li>{{ __('Local address:') }} <span class="ml-2"> {{ $user['local-address'] ?? '' }}</span>
                                    <li>{{ __('Remote address:') }} <span class="ml-2"> {{ $user['remote-address'] ?? '' }}</span>
                                    <li>{{ __('Use MPLS:') }} <span class="ml-2"> {{ $user['use-mpls'] ?? '' }}</span>
                                    <li>{{ __('Use compression:') }} <span class="ml-2"> {{ $user['use-compression'] ?? '' }}</span>
                                    <li>{{ __('Use encryption:') }} <span class="ml-2"> {{ $user['use-encryption'] ?? '' }}</span>
                                    <li>{{ __('Only one:') }} <span class="ml-2"> {{ $user['only-one'] ?? '' }}</span>
                                    <li>{{ __('Change TCP mss:') }} <span class="ml-2"> {{ $user['change-tcp-mss'] ?? '' }}</span>
                                    <li>{{ __('Use UPNP:') }} <span class="ml-2"> {{ $user['use-upnp'] ?? '' }}</span>
                                    <li>{{ __('Address list:') }} <span class="ml-2"> {{ $user['address-list'] ?? '' }}</span>
                                    <li>{{ __('DNS server:') }} <span class="ml-2"> {{ $user['dns-server'] ?? '' }}</span>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
