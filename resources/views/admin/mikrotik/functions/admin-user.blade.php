<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <x-card-title title="{{ __('Mikrotik users') }}"></x-card-title>

                <div class="p-6">
                    <div class="mx-auto">
                        <div class="mt-2">
                            @foreach($mkUsers as $user)
                                <ul class="mb-10">
                                    <li>{{ __('ID:') }} <span class="ml-2"> {{ $user['.id'] ?? '' }}</span>
                                    <li>{{ __('Name:') }} <span class="ml-2"> {{ $user['name'] ?? '' }}</span>
                                    <li>{{ __('Group:') }} <span class="ml-2"> {{ $user['group'] ?? '' }}</span>
                                    <li>{{ __('Address:') }} <span class="ml-2"> {{ $user['address'] ?? '' }}</span>
                                    <li>{{ __('Last logged in:') }} <span class="ml-2"> {{ $user['last-logged-in'] ?? '' }}</span>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>