<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <x-card-title title="{{ __('Add user') }}"></x-card-title>
                <div class="flex items-center justify-center mb-32">
                    <div class="grid rounded-lg w-11/12 md:w-9/12 lg:w-2/2">
                        <form action="{{ route('reseller-user-store') }}" method="POST">
                            @csrf
                            <div class="md:grid md:grid-cols-3 md:gap-6">
                                <div class="md:col-span-1">
                                    <div class="flex mt-5">
                                        <h1 class="text-gray-600 font-bold md:text-xl text-xl">{{ __('Account') }}</h1>
                                    </div>
                                </div>

                                <div class="mt-5 md:mt-0 md:col-span-2">
                                    <div class="grid grid-cols-1 mt-5">
                                        <x-label for="email" value="{{ __('E-mail') }}"></x-label>
                                        <x-input name="email" value="{{ old('email') }}" type="email"></x-input>
                                    </div>

                                    <div class="grid grid-cols-1 mt-5">
                                        <x-label for="password" value="{{ __('Password') }}"></x-label>
                                        <x-input name="password" value="" type="password"></x-input>
                                    </div>

                                    <div class="grid grid-cols-1 mt-5">
                                        <x-label for="password_confirmation"
                                                 value="{{ __('Confirm password') }}"></x-label>
                                        <x-input name="password_confirmation" value="" type="password"></x-input>
                                    </div>
                                </div>
                            </div>

                            <div class="hidden sm:block" aria-hidden="true">
                                <div class="py-5">
                                    <div class="border-t border-gray-200"></div>
                                </div>
                            </div>

                            <div class="md:grid md:grid-cols-3 md:gap-6">
                                <div class="md:col-span-1">
                                    <div class="flex">
                                        <h1 class="text-gray-600 font-bold md:text-xl text-xl">{{ __('Profile') }}</h1>
                                    </div>
                                </div>

                                <div class="mt-5 md:mt-0 md:col-span-2">
                                    <div class="grid grid-cols-1">
                                        <x-label for="name" value="{{ __('Name') }}"></x-label>
                                        <x-input name="name" value="{{ old('name') }}"></x-input>
                                    </div>

                                    <div class="grid grid-cols-1 mt-5">
                                        <x-label for="customer_id" value="{{ __('Customer ID') }}"></x-label>
                                        <x-input name="customer_id" value="{{ old('customer_id') }}"></x-input>
                                    </div>

                                    <div class="grid grid-cols-1 mt-5">
                                        <x-label for="company" value="{{ __('Company') }}"></x-label>
                                        <x-input name="company" value="{{ old('company') }}"></x-input>
                                    </div>

                                    <div class="grid grid-cols-1 mt-5">
                                        <x-label for="address" value="{{ __('Billing address') }}"></x-label>
                                        <x-input name="address" value="{{ old('address') }}"></x-input>
                                    </div>

                                    <div class="grid grid-cols-1 mt-5">
                                        <x-label for="city" value="{{ __('City') }}"></x-label>
                                        <x-input name="city" value="{{ old('city') }}"></x-input>
                                    </div>


                                    <div class="grid grid-cols-1 mt-5">
                                        <x-label for="postcode" value="{{ __('Post code') }}"></x-label>
                                        <x-input name="postcode" value="{{ old('postcode') }}"
                                                 type="number"></x-input>
                                    </div>

                                    <div class="grid grid-cols-1 mt-5">
                                        <x-label for="birth" value="{{ __('Date of birth') }}"></x-label>
                                        <x-input name="birth" value="{{ old('birth') }}" type="date"></x-input>
                                    </div>

                                    <div class="grid grid-cols-1 mt-5">
                                        <x-label for="phone" value="{{ __('Phone number') }}"></x-label>
                                        <x-input name="phone" value="{{ old('phone') }}"></x-input>
                                    </div>

                                    <div class="grid grid-cols-1 mt-5">
                                        <x-label for="emergency"
                                                 value="{{ __('Emergency phone number') }}"></x-label>
                                        <x-input name="emergency" value="{{ old('emergency') }}"></x-input>
                                    </div>

                                    <div class="grid grid-cols-1 mt-5">
                                        <x-label for="national_id"
                                                 value="{{ __('Govt. ID') }}"></x-label>
                                        <x-input name="national_id" value="{{ old('national_id') }}"></x-input>
                                    </div>
                                </div>
                            </div>

                            <div class="hidden sm:block" aria-hidden="true">
                                <div class="py-5">
                                    <div class="border-t border-gray-200"></div>
                                </div>
                            </div>

                            <div class="md:grid md:grid-cols-3 md:gap-6">
                                <div class="md:col-span-1">
                                    <div class="flex">
                                        <h1 class="text-gray-600 font-bold md:text-xl text-xl">{{ __('Subscription') }}</h1>
                                    </div>
                                </div>

                                <div class="mt-5 md:mt-0 md:col-span-2">
                                    <div class="grid grid-cols-1">
                                        <x-label for="package_id" value="{{ __('Select package') }}"></x-label>
                                        <x-select name="package_id">
                                            @foreach($packages as $package)
                                                <option value="{{ $package->id }}">{{ $package->name }}</option>
                                            @endforeach
                                        </x-select>
                                    </div>

                                    <div class="grid grid-cols-1 mt-5">
                                        <x-label for="invoice" value="{{ __('Invoice') }}"></x-label>
                                        <x-input name="invoice" value="{{ old('invoice') }}"></x-input>
                                    </div>
                                </div>
                            </div>

                            @if(getSetting('using_mikrotik'))
                                <div class="hidden sm:block" aria-hidden="true">
                                    <div class="py-5">
                                        <div class="border-t border-gray-200"></div>
                                    </div>
                                </div>

                                <div class="md:grid md:grid-cols-3 md:gap-6">
                                    <div class="md:col-span-1">
                                        <div class="flex">
                                            <h1 class="text-gray-600 font-bold md:text-xl text-xl">{{ __('Mikrotik') }}</h1>
                                        </div>
                                    </div>

                                    <div class="mt-5 md:mt-0 md:col-span-2">
                                        <div class="grid grid-cols-1">
                                            <label class="inline-flex items-center">
                                                <input class="form-radio h-5 w-5 text-indigo-500" type="radio" id="mikro"
                                                       name="mikro" value="Yes" onChange="getValue(this)">
                                                <span
                                                    class="ml-2 text-gray-900 text-md font-medium">{{ __('Add as PPP user (secret)') }}</span>
                                            </label>

                                            <label class="inline-flex items-center mt-3">
                                                <input class="form-radio h-5 w-5 text-indigo-500" type="radio" id="mikro"
                                                       name="mikro" value="No" onChange="getValue(this)">
                                                <span class="ml-2 text-gray-900 text-md font-medium">{{ __('Add as HotSpot user (secret)') }}</span>
                                            </label>
                                        </div>
                                        <div id="ppp_user" style="display:none;">
                                            <div class="grid grid-cols-1 mt-5">
                                                <x-label for="mikrotik_user"
                                                         value="{{ __('PPP username') }}"></x-label>
                                                <x-input name="mikrotik_user"
                                                         value="{{ old('mikrotik_user') }}"></x-input>
                                            </div>

                                            <div class="grid grid-cols-1 mt-5">
                                                <x-label for="mikrotik_password"
                                                         value="{{ __('Password') }}"></x-label>
                                                <x-input name="mikrotik_password" type="password"
                                                         value="{{ old('mikrotik_password') }}"></x-input>
                                            </div>

                                            <div class="grid grid-cols-1 mt-5">
                                                <x-label for="mikrotik_services"
                                                         value="{{ __('Select service') }}"></x-label>
                                                <x-select name="mikrotik_services">
                                                    @foreach($services as $service)
                                                        <option value="{{ $service->name }}">{{ $service->name }}</option>
                                                    @endforeach
                                                </x-select>
                                            </div>

                                            <div class="grid grid-cols-1 mt-5">
                                                <x-label for="mikrotik_profile"
                                                         value="{{ __('Select profile') }}"></x-label>
                                                <x-select name="mikrotik_profile">
                                                    @foreach($ppp_profiles as $profile)
                                                        <option value="{{ $profile['name'] }}">{{ $profile['name'] }}</option>
                                                    @endforeach
                                                </x-select>
                                            </div>
                                        </div>

                                        <div id="hotspot_user" style="display:none;">
                                            <div class="grid grid-cols-1 mt-5">
                                                <x-label for="mikrotik_user"
                                                         value="{{ __('HotSpot username') }}"></x-label>
                                                <x-input name="mikrotik_hotspot_user"
                                                         value="{{ old('mikrotik_hotspot_user') }}"></x-input>
                                            </div>

                                            <div class="grid grid-cols-1 mt-5">
                                                <x-label for="mikrotik_hotspot_password"
                                                         value="{{ __('Password') }}"></x-label>
                                                <x-input name="mikrotik_hotspot_password" type="password"
                                                         value="{{ old('mikrotik_hotspot_password') }}"></x-input>
                                            </div>

                                            <div class="grid grid-cols-1 mt-5">
                                                <x-label for="mikrotik_hotspot_profile"
                                                         value="{{ __('Select profile') }}"></x-label>
                                                <x-select name="mikrotik_hotspot_profile">
                                                    @foreach($hotspot_profiles as $profile)
                                                        <option value="{{ $profile['name'] }}">{{ $profile['name'] }}</option>
                                                    @endforeach
                                                </x-select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="grid grid-cols-1 justify-center mt-6">
                                <x-button-save>{{ __('Save') }}</x-button-save>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function getValue(x) {
                if (x.value == 'No') {
                    document.getElementById("ppp_user").style.display = 'none'; // you need a identifier for changes
                    document.getElementById("hotspot_user").style.display = 'block'; // you need a identifier for changes
                } else {
                    document.getElementById("ppp_user").style.display = 'block';  // you need a identifier for changes
                    document.getElementById("hotspot_user").style.display = 'none';  // you need a identifier for changes
                }
            }
        </script>
    @endpush
</x-app-layout>
