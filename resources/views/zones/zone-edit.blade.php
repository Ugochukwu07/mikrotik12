<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <x-card-title title="{{ __('Edit service zone details') }}"></x-card-title>
                <div class="flex items-center justify-center mb-32">
                    <div class="grid rounded-lg w-11/12 md:w-9/12 lg:w-2/2">
                        <form action="{{ route('service-zone-update', $serviceZone->id) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="grid grid-cols-1">
                                <x-label for="name" value="{{ __('Zone name') }}"></x-label>
                                <x-input name="name" value="{{ $serviceZone->name }}"></x-input>
                            </div>
                            <div class="grid grid-cols-1 mt-5">
                                <x-label for="area" value="{{ __('Areas') }}"></x-label>
                                <x-input name="area" value="{{ $serviceZone->area }}"></x-input>
                            </div>
                            <div class="grid grid-cols-1 justify-center">
                                <x-button-save>{{ __('Save') }}</x-button-save>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
