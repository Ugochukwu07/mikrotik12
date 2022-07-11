<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            @if ($message = session('success'))
                <x-flash-success>{{ $message }}</x-flash-success>
            @endif

            <div class="bg-white overflow-hidden sm:rounded-lg">
                <x-card-title title="{{ __('Profile') }}"></x-card-title>
                <div class="flex items-center justify-center mb-32">
                    <div class="grid rounded-lg w-12/12 md:w-9/12 lg:w-2/2">
                        <form action="{{ route('profile-update', auth()->id()) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="md:grid md:grid-cols-3 md:gap-6">
                                <div class="md:col-span-1">
                                    <div class="flex pt-6">
                                        <h1 class="text-gray-600 font-medium md:text-xl text-xl">{{ __('Profile settings') }}</h1>
                                    </div>
                                </div>

                                <div class="mt-5 md:mt-0 md:col-span-2">
                                    <div class="mt-5 md:mt-0 md:col-span-2">
                                        <div class="grid grid-cols-1 mt-5">
                                            <x-label for="name" value="{{ __('Name') }}"></x-label>
                                            <x-input name="name" class="bg-gray-100" value="{{ $user->name }}"
                                                     disabled></x-input>
                                        </div>

                                        <div class="grid grid-cols-1 mt-5">
                                            <x-label for="email" value="{{ __('E-mail') }}"></x-label>
                                            <x-input name="email" class="bg-gray-100" value="{{ $user->email }}" type="email" disabled></x-input>
                                        </div>

                                        <div class="grid grid-cols-1 mt-5">
                                            <x-label for="password" value="{{ __('Password') }}"></x-label>
                                            <x-input name="password" value="" type="password"></x-input>
                                        </div>

                                        <div class="grid grid-cols-1 mt-5">
                                            <x-label for="password_confirmation" value="{{ __('Confirm password') }}"></x-label>
                                            <x-input name="password_confirmation" value="" type="password"></x-input>
                                        </div>

                                        <div class="grid grid-cols-1 mt-5">
                                            <x-label for="company" value="{{ __('Company name') }}"></x-label>
                                            <x-input name="company" class="bg-gray-100" value="{{ $user->company }}" disabled></x-input>
                                        </div>

                                        <div class="grid grid-cols-1 mt-5">
                                            <x-label for="phone" value="{{ __('Phone number') }}"></x-label>
                                            <x-input name="phone" class="bg-gray-100" value="{{ $user->phone }}" disabled></x-input>
                                        </div>

                                        <div class="grid grid-cols-1 mt-5">
                                            <x-label for="emergency" value="{{ __('Emergency contact') }}"></x-label>
                                            <x-input name="emergency" value="{{ $user->emergency }}"></x-input>
                                        </div>

                                        <div class="grid grid-cols-1 mt-5">
                                            <x-label for="address" value="{{ __('Address') }}"></x-label>
                                            <x-input name="address" class="bg-gray-100" value="{{ $user->address }}" disabled></x-input>
                                        </div>

                                        <div class="grid grid-cols-1 mt-5">
                                            <x-label for="city" value="{{ __('City') }}"></x-label>
                                            <x-input name="city" class="bg-gray-100" value="{{ $user->city }}" disabled></x-input>
                                        </div>

                                        <div class="grid grid-cols-1 mt-5">
                                            <x-label for="postcode" value="{{ __('Post code') }}"></x-label>
                                            <x-input name="postcode" class="bg-gray-100" value="{{ $user->postcode }}" disabled></x-input>
                                        </div>

                                        <div class="grid grid-cols-1 mt-5">
                                            <x-label for="birth" value="{{ __('Date of birth') }}"></x-label>
                                            <x-input name="birth" value="{{ $user->birth }}" type="date"></x-input>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 justify-center mt-6">
                                        <x-button-save>{{ __('Update') }}</x-button-save>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            setTimeout(function () {
                document.getElementById('msg').remove();
            }, 5000);
        </script>
    @endpush
</x-app-layout>
