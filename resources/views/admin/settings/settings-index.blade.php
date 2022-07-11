<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            @if ($message = session('success'))
                <x-flash-success>{{ $message }}</x-flash-success>
            @endif

            <div class="bg-white overflow-hidden sm:rounded-lg">
                <x-card-title title="{{ __('Settings') }}"></x-card-title>
                <div class="flex items-center justify-center mb-32">
                    <div class="grid rounded-lg w-12/12 md:w-9/12 lg:w-2/2">
                        <form action="{{ route('settings-update', $settings->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="md:grid md:grid-cols-3 md:gap-6 mt-10">
                                <div class="md:col-span-1">
                                    <div class="flex pt-1">
                                        <h1 class="text-gray-600 font-medium md:text-xl text-xl">{{ __('Application') }}</h1>
                                    </div>
                                </div>

                                <div class="md:mt-0 md:col-span-2">
                                    <div class="grid grid-cols-1">
                                        <x-checkbox name="using_reseller" checked="{{ $settings->using_reseller }}">
                                            {{ __('Enable reseller') }}
                                        </x-checkbox>
                                    </div>

                                    <div class="grid grid-cols-1 mt-5">
                                        <x-checkbox name="using_staff" checked="{{ $settings->using_staff }}">
                                            {{ __('Enable staff') }}
                                        </x-checkbox>
                                    </div>

                                    <div class="grid grid-cols-1 mt-5">
                                        <x-checkbox name="using_mikrotik" checked="{{ $settings->using_mikrotik }}">
                                            {{ __('Enable Mikrotik') }}
                                        </x-checkbox>
                                    </div>

                                    <div class="grid grid-cols-1 mt-5">
                                        <x-checkbox name="using_customer_manager" checked="{{ $settings->using_customer_manager }}">
                                            {{ __('Enable customer manager') }}
                                        </x-checkbox>
                                    </div>

                                    <div class="grid grid-cols-1 mt-5">
                                        <x-checkbox name="using_service_zone" checked="{{ $settings->using_service_zone }}">
                                            {{ __('Enable service zone') }}
                                        </x-checkbox>
                                    </div>
                                    <div class="grid grid-cols-1 mt-5">
                                        <x-checkbox name="using_stripe" checked="{{ $settings->using_stripe }}">
                                            {{ __('Enable email notification') }}
                                        </x-checkbox>
                                    </div>
                                </div>
                            </div>

                            <div class="hidden sm:block" aria-hidden="true">
                                <div class="py-5 mt-5">
                                    <div class="border-t border-gray-200"></div>
                                </div>
                            </div>

                            <div class="md:grid md:grid-cols-3 md:gap-6">
                                <div class="md:col-span-1">
                                    <div class="flex pt-6">
                                        <h1 class="text-gray-600 font-medium md:text-xl text-xl">{{ __('Subscription') }}</h1>
                                    </div>
                                </div>

                                <div class="mt-5 md:mt-0 md:col-span-2">
                                    <div class="grid grid-cols-1 mt-5">
                                        <x-label for="package_expires_in"
                                                 value="{{ __('Package duration (days)') }}"></x-label>
                                        <x-input name="package_expires_in" type="number"
                                                 value="{{ $settings->package_expires_in }}"></x-input>
                                    </div>

                                    <div class="grid grid-cols-1 mt-5">
                                        <x-label for="last_pay_day" value="{{ __('Pay within (days)') }}"></x-label>
                                        <x-input name="last_pay_day" type="number"
                                                 value="{{ $settings->last_pay_day }}"></x-input>
                                    </div>
                                </div>
                            </div>

                            <div class="hidden sm:block" aria-hidden="true">
                                <div class="py-5 mt-5">
                                    <div class="border-t border-gray-200"></div>
                                </div>
                            </div>

                            <div class="md:grid md:grid-cols-3 md:gap-6">
                                <div class="md:col-span-1">
                                    <div class="flex pt-6">
                                        <h1 class="text-gray-600 font-medium md:text-xl text-xl">{{ __('Mikrotik') }}</h1>
                                    </div>
                                </div>

                                <div class="mt-5 md:mt-0 md:col-span-2">
                                    <div class="grid grid-cols-1 mt-5">
                                        <x-label for="mikrotik_ip" value="{{ __('Mikrotik IP') }}"></x-label>
                                        <x-input name="mikrotik_ip" value="{{ $settings->mikrotik_ip }}"></x-input>
                                    </div>

                                    <div class="grid grid-cols-1 mt-5">
                                        <x-label for="mikrotik_username"
                                                 value="{{ __('Mikrotik username') }}"></x-label>
                                        <x-input name="mikrotik_username"
                                                 value="{{ $settings->mikrotik_login_username }}"></x-input>
                                    </div>

                                    <div class="grid grid-cols-1 mt-5">
                                        <x-label for="mikrotik_password"
                                                 value="{{ __('Mikrotik password') }}"></x-label>
                                        <x-input type="password" name="mikrotik_password"
                                                 value="{{ $settings->mikrotik_login_password }}"></x-input>
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

    @push('scripts')
        <script>
            setTimeout(function () {
                document.getElementById('msg').remove();
            }, 5000);
        </script>
    @endpush
</x-app-layout>
