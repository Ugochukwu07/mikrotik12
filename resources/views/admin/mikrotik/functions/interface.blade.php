<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <x-card-title title="{{ __('Mikrotik interfaces') }}"></x-card-title>

                <div class="p-6">
                    <div class="mx-auto">
                        <div class="mt-2">
                            @foreach($interfaces as $interface)
                                <ul class="mb-10">
                                    <li>{{ __('name:') }} <span class="ml-2"> {{ $interface['name'] ?? '' }}</span>
                                    <li>{{ __('default-name:') }} <span class="ml-2"> {{ $interface['default-name'] ?? '' }}</span>
                                    <li>{{ __('type:') }} <span class="ml-2"> {{ $interface['type'] ?? '' }}</span>
                                    <li>{{ __('mtu:') }} <span class="ml-2"> {{ $interface['mtu'] ?? '' }}</span>
                                    <li>{{ __('actual-mtu:') }} <span class="ml-2"> {{ $interface['actual-mtu'] ?? '' }}</span>
                                    <li>{{ __('mac-address:') }} <span class="ml-2"> {{ $interface['mac-address'] ?? '' }}</span>
                                    <li>{{ __('last-link-up-time:') }} <span class="ml-2"> {{ $interface['last-link-up-time'] ?? '' }}</span>
                                    <li>{{ __('link-downs:') }} <span class="ml-2"> {{ $interface['link-downs'] ?? '' }}</span>
                                    <li>{{ __('rx-byte:') }} <span class="ml-2"> {{ $interface['rx-byte'] ?? '' }}</span>
                                    <li>{{ __('tx-byte:') }} <span class="ml-2"> {{ $interface['tx-byte'] ?? '' }}</span>
                                    <li>{{ __('rx-packet:') }} <span class="ml-2"> {{ $interface['rx-packet'] ?? '' }}</span>
                                    <li>{{ __('tx-packet:') }} <span class="ml-2"> {{ $interface['tx-packet'] ?? '' }}</span>
                                    <li>{{ __('rx-drop:') }} <span class="ml-2"> {{ $interface['rx-drop'] ?? '' }}</span>
                                    <li>{{ __('tx-drop:') }} <span class="ml-2"> {{ $interface['tx-drop'] ?? '' }}</span>
                                    <li>{{ __('tx-queue-drop:') }} <span class="ml-2"> {{ $interface['tx-queue-drop'] ?? '' }}</span>
                                    <li>{{ __('rx-error:') }} <span class="ml-2"> {{ $interface['rx-error'] ?? '' }}</span>
                                    <li>{{ __('tx-error:') }} <span class="ml-2"> {{ $interface['tx-error'] ?? '' }}</span>
                                    <li>{{ __('fp-rx-byte:') }} <span class="ml-2"> {{ $interface['fp-rx-byte'] ?? '' }}</span>
                                    <li>{{ __('fp-tx-byte:') }} <span class="ml-2"> {{ $interface['fp-tx-byte'] ?? '' }}</span>
                                    <li>{{ __('fp-rx-packet:') }} <span class="ml-2"> {{ $interface['fp-rx-packet'] ?? '' }}</span>
                                    <li>{{ __('fp-tx-packet:') }} <span class="ml-2"> {{ $interface['fp-tx-packet'] ?? '' }}</span>
                                    <li>{{ __('running:') }} <span class="ml-2"> {{ $interface['running'] ?? '' }}</span>
                                    <li>{{ __('disabled:') }} <span class="ml-2"> {{ $interface['disabled'] ?? '' }}</span>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
