<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <x-card-title title="{{ __('Add package') }}"></x-card-title>
                <div class="flex items-center justify-center mb-32">
                    <div class="grid rounded-lg w-11/12 md:w-9/12 lg:w-2/2">
                        <form action="{{ route('packages-store') }}" method="POST">
                            @csrf
                            <div class="md:grid md:grid-cols-3 md:gap-6">
                                <div class="md:col-span-1">
                                    <div class="flex pt-6">
                                        <h1 class="text-gray-600 font-bold md:text-2xl text-xl">{{ __('Package details') }}</h1>
                                    </div>
                                </div>

                                <div class="mt-5 md:mt-0 md:col-span-2">
                                        <div class="grid grid-cols-1 mt-5">
                                            <x-label for="name" value="{{ __('Package name') }}"></x-label>
                                            <x-input name="name" value="{{ old('name') }}"></x-input>
                                        </div>

                                        <div class="grid grid-cols-1 mt-5">
                                            <x-label for="bandwidth" value="{{ __('Bandwidth (Mbps)') }}"></x-label>
                                            <x-input name="bandwidth" value="{{ old('bandwidth') }}"
                                                     type="number"></x-input>
                                        </div>

                                        <div class="grid grid-cols-1 mt-5">
                                            <x-label for="user_price" value="{{ __('User price') }}"></x-label>
                                            <x-input name="user_price" value="{{ old('user_price') }}"
                                                     type="number"></x-input>
                                        </div>

                                    @if(getSetting('using_reseller'))
                                        <div class="grid grid-cols-1 mt-5">
                                            <x-label for="reseller_price" value="{{ __('Reseller price') }}"></x-label>
                                            <x-input name="reseller_price" value="{{ old('reseller_price') }}"
                                                     type="number"></x-input>
                                        </div>
                                    @endif

                                    @if(getSetting('using_mikrotik'))
                                        <div class="grid grid-cols-1 mt-5">
                                            <x-radio name="type"
                                                     value="1">{{ __('Add in Mikrotik as PPP profile') }}</x-radio>
                                            <x-radio name="type"
                                                     value="0">{{ __('Add in Mikrotik as HotSpot user profile') }}</x-radio>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="grid grid-cols-1 justify-center mt-6">
                                <x-button-save>{{ __('Save') }}</x-button-save>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
