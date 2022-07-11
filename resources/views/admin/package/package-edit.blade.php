<x-app-layout>
    @if(auth()->user()->can('edit-package'))
        <div class="py-10">
            <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden sm:rounded-lg">
                    <x-card-title title="{{ __('Edit package') }}"></x-card-title>
                    <div class="flex items-center justify-center mb-32">
                        <div class="grid rounded-lg w-11/12 md:w-9/12 lg:w-2/2">
                            <form action="{{ route('packages-update', $package->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="md:grid md:grid-cols-3 md:gap-6">
                                    <div class="md:col-span-1">
                                        <div class="flex pt-6">
                                            <h1 class="text-gray-600 font-bold md:text-2xl text-xl">{{ __('Package details') }}</h1>
                                        </div>
                                    </div>

                                    <div class="mt-5 md:mt-0 md:col-span-2">
                                        <div class="grid grid-cols-1 mt-5">
                                            <x-label for="name" value="{{ __('Package name') }}"></x-label>
                                            <x-input name="name" class="bg-gray-100" value="{{ $package->name }}" disabled></x-input>
                                        </div>

                                        <div class="grid grid-cols-1 mt-5">
                                            <x-label for="bandwidth" value="{{ __('Bandwidth (Mbps)') }}"></x-label>
                                            <x-input name="bandwidth" value="{{ $package->bandwidth }}"></x-input>
                                        </div>

                                        @if(auth()->user()->can('view-user-package-price'))
                                            <div class="grid grid-cols-1 mt-5">
                                            <x-label for="user_price" value="{{ __('User price') }}"></x-label>
                                            <x-input name="user_price" value="{{ $package->user_price }}" type="number"></x-input>
                                        </div>
                                        @endif

                                        @if(getSetting('using_reseller') && auth()->user()->can('view-reseller-package-price'))
                                            <div class="grid grid-cols-1 mt-5">
                                                <x-label for="reseller_price" value="{{ __('Reseller price') }}"></x-label>
                                                <x-input name="reseller_price" value="{{ $package->reseller_price }}" type="number"></x-input>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 justify-center mt-6">
                                    <x-button-save>{{ __('Update') }}</x-button-save>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
