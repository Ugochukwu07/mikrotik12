<x-app-layout>
    @if(auth()->user()->can('view-subscription'))
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden sm:rounded-lg">
                <x-card-title title="{{ __('Subscriptions') }}"></x-card-title>

                <div class="p-6">
                    <div class="mx-auto">
                        <div class="mt-2">
                            <div>
                                <livewire:subscriptions/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>
