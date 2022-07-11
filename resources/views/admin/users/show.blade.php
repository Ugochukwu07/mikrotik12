<x-app-layout>
    <div class="py-10">
        <div class="pt-0">
            <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                @if ($message = session('success'))
                    <x-flash-success>{{ $message }}</x-flash-success>
                @endif
                @if ($message = session('danger'))
                    <x-flash-danger>{{ $message }}</x-flash-danger>
                @endif
                @if ($message = session('warning'))
                    <x-flash-danger>{{ $message }}</x-flash-danger>
                @endif
                <div class="bg-white overflow-hidden sm:rounded-lg">
                    <div class="border-b border-gray-200">
                        <section class="xl:px-6 md:px-4 pt-4 pb-4 sm:pb-6 lg:pb-4 xl:pb-6 space-y-4">
                            <nav class="font-sans flex flex-col text-center content-center sm:flex-row sm:text-left sm:justify-between py-2 sm:items-baseline w-full">
                                <div class="mb-2 sm:mb-0 inner">
                                    <div class="text-xl no-underline text-grey-darkest hover:text-blue-dark font-sans font-bold">{{ $user->name }}</div>
                                </div>

                                @can('edit-user')
                                    <div class="sm:mb-0 self-center inline-flex">
                                        <div>
                                            <a href="{{ route('users-edit', $user->id) }}" class="mr-2 text-gray-600 inline">{{ __('Edit') }}</a>
                                            <x-devider/>
                                            <a href="{{ route('package-renew', $user->id) }}" class="mr-2 text-gray-600 inline">{{ __('Renew') }}</a>
                                            @if(!($user->status == 3))
                                                <x-devider/>
                                                <form action="{{ route('terminate-user', ['user' => $user->id]) }}" method="POST" class="inline text-red-600">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button id="confirmation">{{ __('Terminate') }}</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                @endcan
                            </nav>
                        </section>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-10">
            <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden sm:rounded-lg">
                    <div class="md:flex no-wrap md:-mx-2">
                        <div class="w-full md:w-3/12 md:mx-2">
                            <div class="bg-white p-3 rounded-md">
                                <div class="flex items-center ml-4 space-x-2 font-bold text-gray-900 leading-8">
                                    <span class="tracking-wide">{{ __('Subscription') }}</span>
                                </div>
                                <ul class="text-gray-600 py-2 px-3">
                                    <li class="flex items-center py-3 text-sm">
                                        <span>{{ __('Status') }}</span>
                                        <span class="ml-auto">
                                            <span class="py-1 px-2 rounded text-sm">
                                                @if($user->status == 1)
                                                    <x-badge-success>{{ __('Active') }}</x-badge-success>
                                                @endif

                                                @if($user->status == 2)
                                                    <x-badge-warning>{{ __('Expired') }}</x-badge-warning>
                                                @endif

                                                @if($user->status == 3)
                                                    <x-badge-danger>{{ __('Terminated') }}</x-badge-danger>
                                                @endif
                                            </span>
                                        </span>
                                    </li>
                                    <li class="flex items-center py-3 text-sm">
                                        <span>{{ __('Due') }}</span>
                                        <span class="ml-auto">
                                            @if($user->due_amount($user->id) === 0)
                                                <x-badge-info>{{ config('app.currency') . __(' ') . $user->due_amount($user->id) }}</x-badge-info>
                                            @endif

                                            @if($user->due_amount($user->id) !== 0)
                                                <x-badge-rose>{{ config('app.currency') . __(' ') . $user->due_amount($user->id) }}</x-badge-rose>
                                            @endif
                                            </span>
                                    </li>
                                    <li class="flex items-center py-3 text-sm">
                                        <span>{{ __('Current package') }}</span>
                                        <span class="ml-auto">{{ $user->subscription->package_name }}</span>
                                    </li>
                                    <li class="flex items-center py-3 text-sm">
                                        <span>{{ __('Package expires') }}</span>
                                        <span class="ml-auto">{{ date('Y-m-d', strtotime($user->subscription->subscription_expires)) }}</span>
                                    </li>
                                </ul>
                                <div class="flex items-center ml-4 space-x-2 font-bold text-gray-900 leading-8">
                                    <span class="tracking-wide">{{ __('Profile') }}</span>
                                </div>
                                <ul class="text-gray-600 py-2 px-3">
                                    <li class="flex items-center py-3 text-sm">
                                        <span>{{ __('E-mail') }}</span>
                                        <span class="ml-auto">{{ $user->email }}</span>
                                    </li>
                                    <li class="flex items-center py-3 text-sm">
                                        <span>{{ __('Company') }}</span>
                                        <span class="ml-auto">{{ $user->company }}</span>
                                    </li>
                                    <li class="flex items-center py-3 text-sm">
                                        <span>{{ __('Address') }}</span>
                                        <span class="ml-auto">{{ $user->address }}</span>
                                    </li>
                                    <li class="flex items-center py-3 text-sm">
                                        <span>{{ __('City') }}</span>
                                        <span class="ml-auto">{{ $user->city }}</span>
                                    </li>
                                    <li class="flex items-center py-3 text-sm">
                                        <span>{{ __('Postcode') }}</span>
                                        <span class="ml-auto">{{ $user->postcode }}</span>
                                    </li>
                                    @if(getSetting('service_zone_id'))
                                        <li class="flex items-center py-3 text-sm">
                                            <span>{{ __('Service zone') }}</span>
                                            <span class="ml-auto">{{ $user->serviceZone->name }}</span>
                                        </li>
                                    @endif
                                    <li class="flex items-center py-3 text-sm">
                                        <span>{{ __('Phone') }}</span>
                                        <span class="ml-auto">{{ $user->phone }}</span>
                                    </li>
                                    <li class="flex items-center py-3 text-sm">
                                        <span>{{ __('Emergency contact') }}</span>
                                        <span class="ml-auto">{{ $user->emergency }}</span>
                                    </li>
                                    <li class="flex items-center py-3 text-sm">
                                        <span>{{ __('Date of birth') }}</span>
                                        <span class="ml-auto">{{ $user->birth }}</span>
                                    </li>
                                    <li class="flex items-center py-3 text-sm">
                                        <span>{{ __('Member since') }}</span>
                                        <span class="ml-auto">{{ date('Y-m-d', strtotime($user->created_at)) }}</span>
                                    </li>
                                    @if($user->reseller_id)
                                        <li class="flex items-center py-3 text-sm">
                                            <span>{{ __('Reseller') }}</span>
                                            <span class="ml-auto">{{ $user->reseller->name ?? '-' }}</span>
                                        </li>
                                    @endif
                                    @if($user->manager_id)
                                        <li class="flex items-center py-3 text-sm">
                                            <span>{{ __('Manager') }}</span>
                                            <span class="ml-auto">{{ $user->manager->name ?? '-' }}</span>
                                        </li>
                                    @endif
                                    @if($user->mikrotik_user)
                                        <li class="flex items-center py-3 text-sm">
                                            <span>{{ __('Mikrotik user') }}</span>
                                            <span class="ml-auto">{{ $user->mikrotik_user ?? '-' }}</span>
                                        </li>
                                        <li class="flex items-center py-3 text-sm">
                                            <span>{{ __('Connection type') }}</span>
                                            <span class="ml-auto">{{ $user->mikrotik_connection_type ?? '-' }}</span>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="w-full md:w-9/12 mx-2 h-64">
                            <div class="flex flex-col">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="shadow overflow-hidden border-b border-gray-50 sm:rounded-lg p-6 bg-white">
                                            <div class="flex items-center ml-4 space-x-2 font-bold text-gray-900 leading-8 pb-4">
                                                <span class="tracking-wide">{{ __('Ledger') }}</span>
                                            </div>
                                            <div class="hidden sm:block" aria-hidden="true">
                                                <div class="py-5">
                                                    <div class="border-t border-gray-200"></div>
                                                </div>
                                            </div>
                                            <livewire:transaction-management :id="$user->id"></livewire:transaction-management>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
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

            document.getElementById('confirmation').onclick = function () {
                return confirm("<?php echo __("Confirm package deactivation"); ?>");
            }
        </script>
    @endpush
</x-app-layout>
