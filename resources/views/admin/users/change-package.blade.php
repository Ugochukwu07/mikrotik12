<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <x-card-title title="{{ __('Renew user package') }}"></x-card-title>
                <div class="flex items-center justify-center mb-32">
                    <div class="grid rounded-lg w-11/12 md:w-9/12 lg:w-2/2">
                        <form action="{{ route('package-renew-update', $user->id) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="md:grid md:grid-cols-3 md:gap-6">
                                <div class="md:col-span-1">
                                    <div class="flex mt-10">
                                        <h1 class="text-gray-600 font-bold md:text-xl text-xl">{{ __('Subscription') }}</h1>
                                    </div>
                                </div>

                                <div class="mt-5 md:mt-0 md:col-span-2">
                                    <div class="grid grid-cols-1 mt-5">
                                        <x-label for="package_id" value="{{ __('Select package') }}"></x-label>
                                        <x-select name="package_id">
                                            <option value="{{ $user->subscription->package_id }}">{{ $user->subscription->package_name ?? 'Select' }}</option>
                                            @foreach($packages as $package)
                                                <option value="{{ $package->id }}">{{ $package->name }}</option>
                                            @endforeach
                                        </x-select>
                                    </div>

                                    @if (getSetting('using_mikrotik') && ($user->mikrotik_connection_type == "PPP"))
                                        <div class="grid grid-cols-1 mt-5">
                                            <x-label for="mikrotik_profile" value="{{ __('Select profile') }}"></x-label>
                                            <x-select name="mikrotik_profile">
                                                @foreach($ppp_profiles as $profile)
                                                    <option value="{{ $profile['name'] }}">{{ $profile['name'] }}</option>
                                                @endforeach
                                            </x-select>
                                        </div>
                                    @endif

                                    @if (getSetting('using_mikrotik') && ($user->mikrotik_connection_type == "HotSpot"))
                                        <div class="grid grid-cols-1 mt-5">
                                            <x-label for="mikrotik_hotspot_profile" value="{{ __('Select profile') }}"></x-label>
                                            <x-select name="mikrotik_hotspot_profile">
                                                @foreach($hotspot_profiles as $profile)
                                                    <option value="{{ $profile['name'] }}">{{ $profile['name'] }}</option>
                                                @endforeach
                                            </x-select>
                                        </div>
                                    @endif

                                    <div class="grid grid-cols-1 mt-5">
                                        <x-label for="invoice" value="{{ __('Invoice') }}"></x-label>
                                        <x-input name="invoice" value="{{ old('invoice') }}"></x-input>
                                    </div>
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
