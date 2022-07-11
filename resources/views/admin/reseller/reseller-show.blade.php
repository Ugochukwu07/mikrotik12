<x-app-layout>
    <div class="py-10">
        <div class="pt-0">
            <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden sm:rounded-lg">
                    <div class="border-b border-gray-200">
                        <section class="xl:px-6 md:px-4 pt-4 pb-4 sm:pb-6 lg:pb-4 xl:pb-6 space-y-4">
                            <nav class="font-sans flex flex-col text-center content-center sm:flex-row sm:text-left sm:justify-between py-2 sm:items-baseline w-full">
                                <div class="mb-2 sm:mb-0 inner">
                                    <div class="text-xl no-underline text-grey-darkest font-bold">{{ $user->name }}</div>
                                </div>

                                <div class="sm:mb-0 self-center inline-flex">
                                    <div>
                                        <a href="{{ route('resellers-edit', $user->id) }}" class="mr-2 text-gray-600 inline">{{ __('Edit') }}</a>
                                    </div>
                                </div>
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
                                    <span class="tracking-wide">{{ __('Reseller profile ') }}</span>
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
                                    <li class="flex items-center py-3 text-sm">
                                        <span>{{ __('Phone') }}</span>
                                        <span class="ml-auto">{{ $user->phone }}</span>
                                    </li>
                                    <li class="flex items-center py-3 text-sm">
                                        <span>{{ __('Date of birth') }}</span>
                                        <span class="ml-auto">{{ $user->birth }}</span>
                                    </li>
                                    <li class="flex items-center py-3 text-sm">
                                        <span>{{ __('Member since') }}</span>
                                        <span class="ml-auto">{{ date('Y-m-d', strtotime($user->created_at)) }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="w-full md:w-9/12 mx-2 h-64">
                            <div class="flex flex-col">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="shadow overflow-hidden border-b border-gray-50 sm:rounded-lg p-6 bg-white">
                                            <div class="flex items-center ml-4 space-x-2 font-bold text-gray-900 leading-8 pb-4">
                                                <span class="tracking-wide">{{ __('Users') }}</span>
                                            </div>
                                            <div class="shadow overflow-hidden border-b border-gray-50">
                                                <table class="min-w-full divide-y divide-gray-50">
                                                    <thead class="bg-gray-100 text-gray-900">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                            {{ __('Name') }}
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                            {{ __('Package') }}
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                            {{ __('Expire') }}
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                            {{ __('Status') }}
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                            {{ __('Due') }}
                                                        </th>
                                                        @if(auth()->user()->can('edit-user'))
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                                {{ __('Action') }}
                                                            </th>
                                                        @endif
                                                    </tr>
                                                    </thead>
                                                    <tbody class="bg-white divide-y divide-gray-100">
                                                    @foreach($users as $usr)
                                                        <tr>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                <a href="{{ route('users-show', $usr->id) }}" class="text-indigo-500 font-bold">{{ $usr->name }}</a>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                {{ $usr->subscription->package_name ?: '-' }}
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                {{ date('Y-m-d', strtotime($usr->subscription->subscription_expires)) ?: '-' }}
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                @if($usr->status === 1)
                                                                    <x-badge-success>{{ __('Active') }}</x-badge-success>
                                                                @endif

                                                                @if($usr->status === 2)
                                                                    <x-badge-warning>{{ __('Expired') }}</x-badge-warning>
                                                                @endif

                                                                @if($usr->status === 3)
                                                                    <x-badge-danger>{{ __('Terminated') }}</x-badge-danger>
                                                                @endif
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                @if($usr->due_amount($usr->id) === 0)
                                                                    <x-badge-info>{{ config('app.currency') . __(' ') . $usr->due_amount($usr->id) }}</x-badge-info>
                                                                @endif

                                                                @if($usr->due_amount($usr->id) !== 0)
                                                                    <x-badge-rose>{{ config('app.currency') . __(' ') . $usr->due_amount($usr->id) }}</x-badge-rose>
                                                                @endif
                                                            </td>
                                                            @if(auth()->user()->can('edit-user'))
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <a href="{{ route('users-edit', $usr->id) }}" class="mr-2 text-gray-600">{{ __('Edit') }}</a>
                                                                    <x-devider/>
                                                                    <a href="{{ route('package-renew', $usr->id) }}" class="mr-2 text-lime-900">{{ __('Renew') }}</a>
                                                                    @if(!($usr->status == 3))
                                                                        <form action="{{ route('terminate-user', ['user' => $usr->id]) }}" method="POST" class="text-red-600">
                                                                            @csrf
                                                                            @method('PATCH')
                                                                            <button id="confirmation">{{ __('Terminate') }}</button>
                                                                        </form>
                                                                    @endif
                                                                </td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
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
    </div>
    @push('scripts')
        <script>
            document.getElementById('confirmation').onclick = function () {
                return confirm("<?php echo __("Confirm package deactivation"); ?>");
            }
        </script>
    @endpush
</x-app-layout>
