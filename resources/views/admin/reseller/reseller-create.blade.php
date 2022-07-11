<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <x-card-title title="{{ __('Add reseller') }}"></x-card-title>
                <div class="flex items-center justify-center mb-32">
                    <div class="grid rounded-lg w-11/12 md:w-9/12 lg:w-2/2">
                        <form action="{{ route('resellers-store') }}" method="POST">
                            @csrf
                            <div class="md:grid md:grid-cols-3 md:gap-6">
                                <div class="md:col-span-1">
                                    <div class="flex pt-6">
                                        <h1 class="text-gray-600 font-bold md:text-xl text-xl">{{ __('Account') }}</h1>
                                    </div>
                                </div>

                                <div class="mt-5 md:mt-0 md:col-span-2">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                                        <div class="grid grid-cols-1">
                                            <x-label for="name" value="{{ __('Name') }}"></x-label>
                                            <x-input name="name" value="{{ old('name') }}"></x-input>
                                        </div>

                                        <div class="grid grid-cols-1">
                                            <x-label for="email" value="{{ __('E-mail') }}"></x-label>
                                            <x-input name="email" value="{{ old('email') }}" type="email"></x-input>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                                        <div class="grid grid-cols-1">
                                            <x-label for="password" value="{{ __('Password') }}"></x-label>
                                            <x-input name="password" value="" type="password"></x-input>
                                        </div>

                                        <div class="grid grid-cols-1">
                                            <x-label for="password_confirmation"
                                                     value="{{ __('Confirm password') }}"></x-label>
                                            <x-input name="password_confirmation" value="" type="password"></x-input>
                                        </div>
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
                                    <div class="flex mt-10">
                                        <h1 class="text-gray-600 font-bold md:text-xl text-xl">{{ __('Profile') }}</h1>
                                    </div>
                                </div>

                                <div class="mt-5 md:mt-0 md:col-span-2">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                                        <div class="grid grid-cols-1">
                                            <x-label for="company" value="{{ __('Company name') }}"></x-label>
                                            <x-input name="company" value="{{ old('company') }}"></x-input>
                                        </div>

                                        <div class="grid grid-cols-1">
                                            <x-label for="address" value="{{ __('Address') }}"></x-label>
                                            <x-input name="address" value="{{ old('address') }}"></x-input>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                                        <div class="grid grid-cols-1">
                                            <x-label for="city" value="{{ __('City') }}"></x-label>
                                            <x-input name="city" value="{{ old('city') }}"></x-input>
                                        </div>

                                        <div class="grid grid-cols-1">
                                            <x-label for="postcode" value="{{ __('Post code') }}"></x-label>
                                            <x-input name="postcode" value="{{ old('postcode') }}" type="number"></x-input>
                                        </div>
                                    </div>

                                    <div class="mt-5 md:mt-0 md:col-span-2">
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                                            <div class="grid grid-cols-1">
                                                <x-label for="phone" value="{{ __('Phone number') }}"></x-label>
                                                <x-input name="phone" value="{{ old('phone') }}"></x-input>
                                            </div>

                                            <div class="grid grid-cols-1">
                                                <x-label for="birth" value="{{ __('Date of birth') }}"></x-label>
                                                <x-input name="birth" value="{{ old('birth') }}" type="date"></x-input>
                                            </div>
                                        </div>
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