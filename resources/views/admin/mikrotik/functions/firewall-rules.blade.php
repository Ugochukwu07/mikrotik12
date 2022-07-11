<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <x-card-title title="{{ __('Mikrotik firewall filter rules') }}"></x-card-title>

                <div class="p-6">
                    <div class="mx-auto">
                        <div class="mt-2">
                            @foreach($rules as $client)
                                <ul class="mb-10">
                                    <li>{{ __('Chain:') }} <span class="ml-2"> {{ $client['chain'] ?? '' }}</span>
                                    <li>{{ __('Action:') }} <span class="ml-2"> {{ $client['action'] ?? '' }}</span>
                                    <li>{{ __('Protocol:') }} <span class="ml-2"> {{ $client['protocol'] ?? '' }}</span>
                                    <li>{{ __('DST port:') }} <span class="ml-2"> {{ $client['dst-port'] ?? '' }}</span>
                                    <li>{{ __('DST address:') }} <span class="ml-2"> {{ $client['dst-address'] ?? '' }}</span>
                                    <li>{{ __('Connection state:') }} <span class="ml-2"> {{ $client['connection-state'] ?? '' }}</span>
                                    <li>{{ __('Log:') }} <span class="ml-2"> {{ $client['log'] ?? '' }}</span>
                                    <li>{{ __('Log prefix:') }} <span class="ml-2"> {{ $client['log-prefix'] ?? '' }}</span>
                                    <li>{{ __('IPSec policy:') }} <span class="ml-2"> {{ $client['ipsec-policy'] ?? '' }}</span>
                                    <li>{{ __('In interface list:') }} <span class="ml-2"> {{ $client['in-interface-list'] ?? '' }}</span>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
