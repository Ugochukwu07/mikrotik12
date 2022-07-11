<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <x-card-title title="{{ __('Reports') }}"></x-card-title>
                <div class="flex items-center p-4 bg-white rounded-md ml-4">
                    <div>
                        <div class="flex items-center ml-4 space-x-2 font-bold text-gray-900 leading-8 pb-4">
                            <span class="tracking-wide">{{ __('User reports') }}</span>
                        </div>
                        <div class="mt-3">
                            <form action="{{ route('rpt-all-users') }}" method="POST">
                                @csrf
                                <i class="fa fa-download ml-4 mr-2"></i>
                                <button>{{ __('User profile') }}</button>
                            </form>
                        </div>
                        <div class="mt-3">
                            <i class="fa fa-chevron-right ml-4 mr-2"></i>
                            <button id="toggle-reseller-user">{{ __('User profile (by reseller)') }}</button>
                            <div id="reseller-user" style="display: none" class="ml-10 mt-5">
                                <div>
                                    <form action="{{ route('rpt-all-users') }}" method="POST">
                                        @csrf
                                        <x-label for="reseller_id" value="{{ __('Select reseller') }}"></x-label>
                                        <x-select name="reseller_id" class="w-full">
                                            @foreach($resellers as $reseller)
                                                <option value="{{ $reseller->id }}">{{ $reseller->name }}</option>
                                            @endforeach
                                        </x-select>
                                        <x-button-save>{{ __('Download') }}</x-button-save>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <i class="fa fa-chevron-right ml-4 mr-2"></i>
                            <button id="toggle-service-zone">{{ __('User profile (by service zone)') }}</button>
                            <div id="service-zone" style="display: none" class="ml-10 mt-5">
                                <div>
                                    <form action="{{ route('rpt-all-users') }}" method="POST">
                                        @csrf
                                        <x-label for="service_zone" value="{{ __('Select service zone') }}"></x-label>
                                        <x-select name="service_zone" class="w-full">
                                            @foreach($zones as $zone)
                                                <option value="{{ $zone->id }}">{{ $zone->name }}</option>
                                            @endforeach
                                        </x-select>
                                        <x-button-save>{{ __('Download') }}</x-button-save>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <i class="fa fa-chevron-right ml-4 mr-2"></i>
                            <button id="toggle-manager">{{ __('User profile (by manager)') }}</button>
                            <div id="manager" style="display: none" class="ml-10 mt-5">
                                <div>
                                    <form action="{{ route('rpt-all-users') }}" method="POST">
                                        @csrf
                                        <x-label for="manager" value="{{ __('Select manager') }}"></x-label>
                                        <x-select name="manager" class="w-full">
                                            @foreach($managers as $manager)
                                                <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                            @endforeach
                                        </x-select>
                                        <x-button-save>{{ __('Download') }}</x-button-save>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center ml-4 space-x-2 font-bold text-gray-900 leading-8 pb-4 pt-10">
                            <span class="tracking-wide">{{ __('Accounting') }}</span>
                        </div>
                        <div class="mt-3">
                            <i class="fa fa-chevron-right ml-4 mr-2"></i>
                            <button id="toggle-income">{{ __('Income') }}</button>
                            <div id="income" style="display: none" class="ml-10 mt-5">
                                <div>
                                    <form action="{{ route('rpt-accounting') }}" method="POST">
                                        @csrf
                                        <x-label for="income" value="{{ __('Select year') }}"></x-label>
                                        <x-select name="income" class="w-full">
                                            @foreach($years_income as $year)
                                                <option value="{{ $year->year }}">{{ $year->year }}</option>
                                            @endforeach
                                        </x-select>
                                        <x-button-save>{{ __('Download') }}</x-button-save>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <i class="fa fa-chevron-right ml-4 mr-2"></i>
                            <button id="toggle-expense">{{ __('Expense') }}</button>
                            <div id="expense" style="display: none" class="ml-10 mt-5">
                                <div>
                                    <form action="{{ route('rpt-accounting') }}" method="POST">
                                        @csrf
                                        <x-label for="expense" value="{{ __('Select year') }}"></x-label>
                                        <x-select name="expense" class="w-full">
                                            @foreach($years_expense as $year)
                                                <option value="{{ $year->year }}">{{ $year->year }}</option>
                                            @endforeach
                                        </x-select>
                                        <x-button-save>{{ __('Download') }}</x-button-save>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center ml-4 space-x-2 font-bold text-gray-900 leading-8 pb-4 mt-10">
                            <span class="tracking-wide">{{ __('Subscription/billing') }}</span>
                        </div>
                        <div class="mt-3">
                            <i class="fa fa-chevron-right ml-4 mr-2"></i>
                            <button id="toggle-billing">{{ __('User billing') }}</button>
                            <div id="billing" style="display: none" class="ml-10 mt-5">
                                <div>
                                    <form action="{{ route('rpt-user-billing') }}" method="POST">
                                        @csrf
                                        <x-label for="billing" value="{{ __('Select year') }}"></x-label>
                                        <x-select name="billing" class="w-full">
                                            @foreach($years_billing as $year)
                                                <option value="{{ $year->year }}">{{ $year->year }}</option>
                                            @endforeach
                                        </x-select>
                                        <x-button-save>{{ __('Download') }}</x-button-save>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center ml-4 space-x-2 font-bold text-gray-900 leading-8 pb-4 pt-6">
                            <span class="tracking-wide">{{ __('Payments') }}</span>
                        </div>
                        <div class="mt-3">
                            <i class="fa fa-chevron-right ml-4 mr-2"></i>
                            <button id="toggle-payment">{{ __('Payment') }}</button>
                            <div id="payment" style="display: none" class="ml-10 mt-5">
                                <div>
                                    <form action="{{ route('rpt-user-payment') }}" method="POST">
                                        @csrf
                                        <x-label for="payment" value="{{ __('Select year') }}"></x-label>
                                        <x-select name="payment" class="w-full">
                                            @foreach($years_payment as $year)
                                                <option value="{{ $year->year }}">{{ $year->year }}</option>
                                            @endforeach
                                        </x-select>
                                        <x-button-save>{{ __('Download') }}</x-button-save>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center ml-4 space-x-2 font-bold text-gray-900 leading-8 pb-4 pt-6">
                            <span class="tracking-wide">{{ __('Mikrotik') }}</span>
                        </div>
                        <div class="mt-3 pb-10">
                            <form action="{{ route('rpt-log') }}" method="POST">
                                @csrf
                                <i class="fa fa-download ml-4 mr-2"></i>
                                <button>{{ __('Log') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            document.querySelector('#toggle-reseller-user').addEventListener('click', function () {
                const user = document.querySelector('#reseller-user');
                if (user.style.display === "none") {
                    user.style.display = "block";
                } else {
                    user.style.display = "none";
                }
            });

            document.querySelector('#toggle-service-zone').addEventListener('click', function () {
                const user = document.querySelector('#service-zone');
                if (user.style.display === "none") {
                    user.style.display = "block";
                } else {
                    user.style.display = "none";
                }
            });

            document.querySelector('#toggle-manager').addEventListener('click', function () {
                const user = document.querySelector('#manager');
                if (user.style.display === "none") {
                    user.style.display = "block";
                } else {
                    user.style.display = "none";
                }
            });

            document.querySelector('#toggle-income').addEventListener('click', function () {
                const user = document.querySelector('#income');
                if (user.style.display === "none") {
                    user.style.display = "block";
                } else {
                    user.style.display = "none";
                }
            });

            document.querySelector('#toggle-expense').addEventListener('click', function () {
                const user = document.querySelector('#expense');
                if (user.style.display === "none") {
                    user.style.display = "block";
                } else {
                    user.style.display = "none";
                }
            });

            document.querySelector('#toggle-billing').addEventListener('click', function () {
                const user = document.querySelector('#billing');
                if (user.style.display === "none") {
                    user.style.display = "block";
                } else {
                    user.style.display = "none";
                }
            });

            document.querySelector('#toggle-payment').addEventListener('click', function () {
                const user = document.querySelector('#payment');
                if (user.style.display === "none") {
                    user.style.display = "block";
                } else {
                    user.style.display = "none";
                }
            });
        </script>
    @endpush
</x-app-layout>
