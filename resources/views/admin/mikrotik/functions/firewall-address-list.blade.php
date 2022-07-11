<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <x-card-title title="{{ __('Mikrotik firewall address list') }}"></x-card-title>

                <div class="p-6">
                    <div class="mx-auto">
                        <div class="mt-2">
                            @foreach($rules as $client)
                                <ul class="mb-10">
                                    <li>{{ __('ID:') }} <span class="ml-2"> {{ $client['.id'] ?? '' }}</span>
                                    <li>{{ __('List:') }} <span class="ml-2"> {{ $client['list'] ?? '' }}</span>
                                    <li>{{ __('Address:') }} <span class="ml-2"> {{ $client['address'] ?? '' }}</span>
                                    <li>{{ __('Creation time:') }} <span class="ml-2"> {{ $client['creation-time'] ?? '' }}</span>
                                    <li>{{ __('Timeout:') }} <span class="ml-2"> {{ $client['timeout'] ?? '' }}</span>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
