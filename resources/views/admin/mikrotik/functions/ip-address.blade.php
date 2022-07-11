<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <x-card-title title="{{ __('Mikrotik IP address') }}"></x-card-title>

                <div class="p-6">
                    <div class="mx-auto">
                        <div class="mt-2">
                            @foreach($addresses as $address)
                                <ul class="mb-10">
                                    <li>{{ __('address:') }} <span class="ml-2"> {{ $address['address'] ?? '' }}</span>
                                    <li>{{ __('network:') }} <span class="ml-2"> {{ $address['network'] ?? '' }}</span>
                                    <li>{{ __('interface:') }} <span class="ml-2"> {{ $address['interface'] ?? '' }}</span>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
