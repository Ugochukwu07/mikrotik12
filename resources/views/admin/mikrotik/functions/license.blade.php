<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <x-card-title title="{{ __('Mikrotik license') }}"></x-card-title>

                <div class="p-6">
                    <div class="mx-auto">
                        <div class="mt-2">
                            @foreach($license as $lic)
                                <ul class="mb-10">
                                    <li>{{ __('System ID:') }} <span class="ml-2"> {{ $lic['system-id'] ?? '' }}</span>
                                    <li>{{ __('Level:') }} <span class="ml-2"> {{ $lic['level'] ?? '' }}</span>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
