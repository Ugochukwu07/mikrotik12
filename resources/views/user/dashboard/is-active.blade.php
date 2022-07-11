<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <section class="container px-6 mx-auto">
                <div class="grid gap-6 mb-8 md:grid-cols-2 lg:grid-cols-3">
                    <div class="flex items-center p-4 bg-white border-l-2 border-emerald-300">
                        <div>
                            <p class="mb-2 ml-4 font-bold text-gray-900">{{ config('app.currency') . __(' ') . $my_bill }}</p>
                            <p class="text-sm ml-4 font-normal text-gray-800">{{ __('Total bill') }}</p>
                            <p class="mb-2 ml-4 font-bold text-gray-900 mt-6">{{ config('app.currency') . __(' ') . $my_payment }}</p>
                            <p class="text-sm ml-4 font-normal text-gray-800">{{ __('Total payment') }}</p>
                            <p class="mb-2 ml-4 font-bold text-gray-900 mt-6">{{ config('app.currency') . __(' ') . ($my_bill - $my_payment) }}</p>
                            <p class="text-sm ml-4 font-normal text-gray-800">{{ __('Total due') }}</p>
                        </div>
                    </div>
                    <div class="flex items-center p-4 bg-white border-l-2 border-yellow-300">
                        <div>
                            <p class="mb-2 ml-4 font-bold text-gray-900">{{ config('app.currency') . __(' ') . $bill }}</p>
                            <p class="text-sm ml-4 font-normal text-gray-800">{{ __('Bill this month') }}</p>
                            <p class="mb-2 ml-4 font-bold text-gray-900 mt-6">{{ config('app.currency') . __(' ') . $payment }}</p>
                            <p class="text-sm ml-4 font-normal text-gray-800">{{ __('Payment this month') }}</p>
                            <p class="mb-2 ml-4 font-bold text-gray-900 mt-6">{{ config('app.currency') . __(' ') . ($bill - $payment) }}</p>
                            <p class="text-sm ml-4 font-normal text-gray-800">{{ __('Due this month') }}</p>
                        </div>
                    </div>
                    <div class="flex items-center p-4 bg-white border-l-2 border-lightBlue-300">
                        <div>
                            <p class="mb-2 ml-4 font-bold text-gray-900">{{ $my_tickets }}</p>
                            <p class="text-sm ml-4 font-normal text-gray-800">{{ __('Tickets') }}</p>
                            <p class="mb-2 ml-4 font-bold text-gray-900 mt-6">{{ $my_open_tickets }}</p>
                            <p class="text-sm ml-4 font-normal text-gray-800">{{ __('Open tickets') }}</p>
                            <p class="mb-2 ml-4 font-bold text-gray-900 mt-6">{{ $my_tickets - $my_open_tickets }}</p>
                            <p class="text-sm ml-4 font-normal text-gray-800">{{ __('Closed tickets') }}</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
