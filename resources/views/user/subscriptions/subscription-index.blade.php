<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden sm:rounded-lg">
                <x-card-title title="{{ __('Subscriptions') }}"></x-card-title>

                <div class="p-6">
                    <div class="mx-auto">
                        <div class="mt-2">
                            <div>
                                <livewire:user-subscription-management/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
