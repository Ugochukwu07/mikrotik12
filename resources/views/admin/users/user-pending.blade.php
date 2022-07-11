<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <x-card-title title="{{ __('Profile of ') . $user->name }}"></x-card-title>

                <div class="p-6">
                    <div class="mx-auto">
                        <div class="mt-2">
                            <form
                                action="{{ action('App\Http\Controllers\Invokable\UserPendingToApprovedController@__invoke', $user->id) }}"
                                method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="md:grid md:grid-cols-3 md:gap-6">
                                    <div class="md:col-span-1">
                                        <div class="flex mt-5">
                                            <h1 class="text-gray-600 font-bold md:text-xl text-xl">{{ __('Profile') }}</h1>
                                        </div>
                                    </div>

                                    <div class="mt-5 md:mt-0 md:col-span-2">
                                        <div class="grid grid-cols-1 mt-5">
                                            <x-label for="name" value="{{ __('Name') }}"></x-label>
                                            <x-input disabled class="font-medium bg-gray-100" name="name"
                                                     value="{{ $user->name }}"></x-input>
                                        </div>

                                        <div class="grid grid-cols-1 mt-5">
                                            <x-label for="email" value="{{ __('Email address') }}"></x-label>
                                            <x-input disabled class="font-medium bg-gray-100" name="email"
                                                     value="{{ $user->email }}"></x-input>
                                        </div>

                                        <div class="grid grid-cols-1 mt-5">
                                            <x-label for="company" value="{{ __('Company name') }}"></x-label>
                                            <x-input name="company" value="{{ $user->profile->company }}"></x-input>
                                        </div>

                                        <div class="grid grid-cols-1 mt-5">
                                            <x-label for="phone" value="{{ __('Phone number') }}"></x-label>
                                            <x-input name="phone" value="{{ $user->profile->phone }}"></x-input>
                                        </div>

                                        <div class="grid grid-cols-1 mt-5">
                                            <x-label for="address" value="{{ __('Billing address') }}"></x-label>
                                            <x-input name="address" value="{{ $user->profile->address }}"></x-input>
                                        </div>

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                                            <div class="grid grid-cols-1">
                                                <x-label for="city" value="{{ __('City') }}"></x-label>
                                                <x-input name="city" value="{{ $user->profile->city }}"></x-input>
                                            </div>

                                            <div class="grid grid-cols-1">
                                                <x-label for="postcode" value="{{ __('Post code') }}"></x-label>
                                                <x-input name="postcode" value="{{ $user->profile->postcode }}"
                                                         type="number"></x-input>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                                            <div class="grid grid-cols-1 mt-5">
                                                <x-label for="emergency"
                                                         value="{{ __('Emergency contact') }}"></x-label>
                                                <x-input name="emergency" value="{{ $user->profile->emergency }}"
                                                         type="number"></x-input>
                                            </div>

                                            <div class="grid grid-cols-1 mt-5">
                                                <x-label for="birth"
                                                         value="{{ __('Date of birth') }}"></x-label>
                                                <x-input name="birth" value="{{ $user->profile->birth }}"
                                                         type="date"></x-input>
                                            </div>
                                        </div>

                                        @if($settings->using_reseller === 1)
                                            <div class="grid grid-cols-1 mt-5">
                                                <x-label for="reseller_id"
                                                         value="{{ __('Assign a reseller') }}"></x-label>
                                                <x-select name="reseller_id">
                                                    @foreach($resellers as $reseller)
                                                        <option
                                                            value="{{ $reseller->id }}">{{ $reseller->name }}</option>
                                                    @endforeach
                                                </x-select>
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
    </div>
</x-app-layout>
