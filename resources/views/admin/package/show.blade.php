<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class="border-b border-gray-200">
                    <section class="xl:px-6 md:px-4 pt-4 pb-4 sm:pb-6 lg:pb-4 xl:pb-6 space-y-4">
                        <nav class="font-sans flex flex-col text-center content-center sm:flex-row sm:text-left sm:justify-between py-2 sm:items-baseline w-full">
                            <div class="mb-2 sm:mb-0 inner">
                                <div class="text-xl no-underline text-grey-darkest hover:text-blue-dark font-sans font-bold">{{ $package->name }}</div>
                            </div>

                            <div class="sm:mb-0 self-center">
                                <div>
                                    <form action="{{ route('packages-delete', $package->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('packages-edit', $package->id) }}" class="mr-2 text-gray-600 inline">{{ __('Edit') }}</a>
                                        <x-devider></x-devider>
                                        <button id="confirmation" type="submit" class="text-red-600 inline">{{ __('Delete') }}</button>
                                    </form>
                                </div>
                            </div>
                        </nav>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <div class="py-1">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="md:flex no-wrap md:-mx-2">
                    <div class="w-full md:w-3/12 md:mx-2">
                        <div class="bg-white p-3 rounded-md">
                            <div class="flex items-center ml-4 space-x-2 font-bold text-gray-900 leading-8">
                                <span class="tracking-wide">{{ __('Package details') }}</span>
                            </div>
                            <ul class="text-gray-600 py-2 px-3 divide-y">
                                <li class="flex items-center py-3 text-sm">
                                    <span>{{ __('Bandwidth') }}</span>
                                    <span class="ml-auto">{{ $package->bandwidth }}</span>
                                </li>
                                <li class="flex items-center py-3 text-sm">
                                    <span>{{ __('User price') }}</span>
                                    <span class="ml-auto">{{ config('app.currency') . __(' ') . $package->user_price }}</span>
                                </li>
                                <li class="flex items-center py-3 text-sm">
                                    <span>{{ __('Visibility') }}</span>
                                    <span class="ml-auto"><span
                                            class="py-1 px-2 rounded text-sm">
                                            @if($package->visibility == 1)
                                                <x-badge-success>{{ __('Published') }}</x-badge-success>
                                            @endif

                                            @if($package->visibility == 0)
                                                <x-badge-warning>{{ __('Hidden') }}</x-badge-warning>
                                            @endif
                                        </span>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="w-full md:w-9/12 mx-2 h-64">
                        <div class="bg-white p-3 shadow-sm rounded-sm">
                            <div class="bg-white p-3 rounded-md">
                                <div class="flex items-center ml-4 space-x-2 font-bold text-gray-900 leading-8">
                                    <span class="tracking-wide">{{ __('Reseller package price') }}</span>
                                </div>
                                <ul class="text-gray-600 py-2 px-3 divide-y">
                                    <li class="flex items-center py-3 text-sm font-bold">
                                        <span class="flex-1">{{ __('Reseller name') }}</span>
                                        <span class="flex-1">{{ __('Reseller price') }}</span>
                                        <span class="flex-1">{{ __('Reseller profit') }}</span>
                                    </li>
                                    @foreach($package->reseller_package_price as $reseller_price)
                                        <li class="flex items-center py-3 text-sm">
                                            <span class="flex-1">{{ $reseller_price->user->name }}</span>
                                            <span class="flex-1">{{ $reseller_price->reseller_price ?? 0 }}</span>
                                            <span class="flex-1">{{ $reseller_price->reseller_profit ?? 0 }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.getElementById('confirmation').onclick = function() {
                return confirm("<?php echo __('Are you sure you want to delete this record?') ?>");
            }
        </script>
    @endpush
</x-app-layout>
