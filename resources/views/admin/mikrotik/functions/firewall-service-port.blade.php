<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <x-card-title title="{{ __('Mikrotik firewall service ports') }}"></x-card-title>

                <div class="p-6">
                    <div class="mx-auto">
                        <div class="mt-2">
                            @foreach($rules as $client)
                                <ul class="mb-10">
                                    <li>{{ __('ID:') }} <span class="ml-2"> {{ $client['.id'] ?? '' }}</span>
                                    <li>{{ __('Name:') }} <span class="ml-2"> {{ $client['name'] ?? '' }}</span>
                                    <li>{{ __('Port:') }} <span class="ml-2"> {{ $client['ports'] ?? '' }}</span>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
