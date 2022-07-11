<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <x-card-title title="{{ __('Mikrotik packages') }}"></x-card-title>

                <div class="p-6">
                    <div class="mx-auto">
                        <div class="mt-2">
                            @foreach($packages as $package)
                                <ul class="mb-10">
                                    <li>{{ __('name:') }} <span class="ml-2"> {{ $package['name'] ?? '' }}</span>
                                    <li>{{ __('version:') }} <span class="ml-2"> {{ $package['version'] ?? '' }}</span>
                                    <li>{{ __('disabled:') }} <span class="ml-2"> {{ $package['disabled'] ?? '' }}</span>
                                    <li>{{ __('build time:') }} <span class="ml-2"> {{ $package['build-time'] ?? '' }}</span>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
