<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <x-card-title title="{{ __('Mikrotik system clock') }}"></x-card-title>

                <div class="p-6">
                    <div class="mx-auto">
                        <div class="mt-2">
                            @foreach($clocks as $clock)
                                <ul class="mb-10">
                                    <li>{{ __('time:') }} <span class="ml-2"> {{ $clock['time'] ?? '' }}</span>
                                    <li>{{ __('date:') }} <span class="ml-2"> {{ $clock['date'] ?? '' }}</span>
                                    <li>{{ __('time-zone-autodetect:') }} <span class="ml-2"> {{ $clock['time-zone-autodetect'] ?? '' }}</span>
                                    <li>{{ __('time-zone-name:') }} <span class="ml-2"> {{ $clock['time-zone-name'] ?? '' }}</span>
                                    <li>{{ __('gmt-offset:') }} <span class="ml-2"> {{ $clock['gmt-offset'] ?? '' }}</span>
                                    <li>{{ __('dst-active:') }} <span class="ml-2"> {{ $clock['dst-active'] ?? '' }}</span>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
