<x-app-layout>
    @if (!auth()->user()->isUser())
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <section class="container px-6 mx-auto">
                <div class="grid gap-6 mb-8 md:grid-cols-2 lg:grid-cols-3">
                    <div class="flex items-center p-4 bg-white border-l-2 border-rose-300">
                        <div>
                            <p class="mb-2 ml-4 font-bold text-gray-900">{{ $total_users }}</p>
                            <p class="text-sm ml-4 font-normal text-gray-800">{{ __('Total users') }}</p>
                            <p class="mb-2 ml-4 font-bold text-gray-900 mt-6">{{ $active_users }}</p>
                            <p class="text-sm ml-4 font-normal text-gray-800">{{ __('Active users') }}</p>
                            <p class="mb-2 ml-4 font-bold text-gray-900 mt-6">{{ $expired_users }}</p>
                            <p class="text-sm ml-4 font-normal text-gray-800">{{ __('Expired users') }}</p>
                        </div>
                    </div>
                    <div class="flex items-center p-4 bg-white border-l-2 border-emerald-300">
                        <div>
                            <p class="mb-2 ml-4 font-bold text-gray-900">{{ config('app.currency') . __(' ') . $total_bill }}</p>
                            <p class="text-sm ml-4 font-normal text-gray-800">{{ __('Bill this month') }}</p>
                            <p class="mb-2 ml-4 font-bold text-gray-900 mt-6">{{ config('app.currency') . __(' ') . $total_payment }}</p>
                            <p class="text-sm ml-4 font-normal text-gray-800">{{ __('Payment this month') }}</p>
                            <p class="mb-2 ml-4 font-bold text-gray-900 mt-6">{{ config('app.currency') . __(' ') . ($total_bill - $total_payment) }}</p>
                            <p class="text-sm ml-4 font-normal text-gray-800">{{ __('Due this month') }}</p>
                        </div>
                    </div>
                    <div class="flex items-center p-4 bg-white border-l-2 border-lightBlue-300">
                        <div>
                            <p class="mb-2 ml-4 font-bold text-gray-900">{{ $all_tickets }}</p>
                            <p class="text-sm ml-4 font-normal text-gray-800">{{ __('Tickets') }}</p>
                            <p class="mb-2 ml-4 font-bold text-gray-900 mt-6">{{ $open_tickets }}</p>
                            <p class="text-sm ml-4 font-normal text-gray-800">{{ __('Open tickets') }}</p>
                            <p class="mb-2 ml-4 font-bold text-gray-900 mt-6">{{ $all_tickets - $open_tickets }}</p>
                            <p class="text-sm ml-4 font-normal text-gray-800">{{ __('Closed tickets') }}</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    @endif
</x-app-layout>
