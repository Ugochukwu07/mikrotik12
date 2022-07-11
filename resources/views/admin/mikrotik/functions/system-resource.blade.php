<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <x-card-title title="{{ __('Mikrotik system resource') }}"></x-card-title>

                <div class="p-6">
                    <div class="mx-auto">
                        <div class="mt-2">
                            @foreach($resources as $resource)
                                <ul>
                                    <li>{{ __('uptime:') }} <span class="ml-2"> {{ $resource['uptime'] ?? '' }}</span>
                                    <li>{{ __('version:') }} <span class="ml-2"> {{ $resource['version'] ?? '' }}</span>
                                    <li>{{ __('build-time:') }} <span class="ml-2"> {{ $resource['build-time'] ?? '' }}</span>
                                    <li>{{ __('free-memory:') }} <span class="ml-2"> {{ $resource['free-memory'] ?? '' }}</span>
                                    <li>{{ __('total-memory:') }} <span class="ml-2"> {{ $resource['total-memory'] ?? '' }}</span>
                                    <li>{{ __('cpu:') }} <span class="ml-2"> {{ $resource['cpu'] ?? '' }}</span>
                                    <li>{{ __('cpu-count:') }} <span class="ml-2"> {{ $resource['cpu-count'] ?? '' }}</span>
                                    <li>{{ __('cpu-frequency:') }} <span class="ml-2"> {{ $resource['cpu-frequency'] ?? '' }}</span>
                                    <li>{{ __('cpu-load:') }} <span class="ml-2"> {{ $resource['cpu-load'] ?? '' }}</span>
                                    <li>{{ __('free-hdd-space:') }} <span class="ml-2"> {{ $resource['free-hdd-space'] ?? '' }}</span>
                                    <li>{{ __('total-hdd-space:') }} <span class="ml-2"> {{ $resource['total-hdd-space'] ?? '' }}</span>
                                    <li>{{ __('write-sect-since-reboot:') }} <span class="ml-2"> {{ $resource['write-sect-since-reboot'] ?? '' }}</span>
                                    <li>{{ __('write-sect-total:') }} <span class="ml-2"> {{ $resource['write-sect-total'] ?? '' }}</span>
                                    <li>{{ __('architecture-name:') }} <span class="ml-2"> {{ $resource['architecture-name'] ?? '' }}</span>
                                    <li>{{ __('board-name:') }} <span class="ml-2"> {{ $resource['board-name'] ?? '' }}</span>
                                    <li>{{ __('platform:') }} <span class="ml-2"> {{ $resource['platform'] ?? '' }}</span>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
