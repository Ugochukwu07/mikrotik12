<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <x-card-title title="{{ __('Mikrotik NTP clients') }}"></x-card-title>

                <div class="p-6">
                    <div class="mx-auto">
                        <div class="mt-2">
                            @foreach($clients as $client)
                                <ul class="mb-10">
                                    <li>{{ __('Enabled:') }} <span class="ml-2"> {{ $client['enabled'] ?? '' }}</span>
                                    <li>{{ __('Primary NTP:') }} <span class="ml-2"> {{ $client['primary-ntp'] ?? '' }}</span>
                                    <li>{{ __('Secondary NTP:') }} <span class="ml-2"> {{ $client['secondary-ntp'] ?? '' }}</span>
                                    <li>{{ __('Server DNS names:') }} <span class="ml-2"> {{ $client['server-dns-names'] ?? '' }}</span>
                                    <li>{{ __('Mode:') }} <span class="ml-2"> {{ $client['mode'] ?? '' }}</span>
                                    <li>{{ __('Poll interval:') }} <span class="ml-2"> {{ $client['poll-interval'] ?? '' }}</span>
                                    <li>{{ __('Active server:') }} <span class="ml-2"> {{ $client['active-server'] ?? '' }}</span>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
