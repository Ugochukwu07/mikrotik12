<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <x-card-title title="{{ __('Add role') }}"></x-card-title>
                <div class="flex items-center justify-center mb-32">
                    <div class="grid rounded-lg w-11/12 md:w-9/12 lg:w-2/2">
                        <form action="{{ route('roles-store') }}" method="POST">
                            @csrf
                            <div class="md:grid md:grid-cols-3 md:gap-6">
                                <div class="md:col-span-1">
                                    <div class="flex mt-5">
                                        <h1 class="text-gray-600 font-bold md:text-xl text-xl">{{ __('Role and permission') }}</h1>
                                    </div>
                                </div>

                                <div class="mt-5 md:mt-0 md:col-span-2">
                                    <div class="grid grid-cols-1 mt-5">
                                        <x-label for="name" value="{{ __('Role') }}"></x-label>
                                        <x-input name="name" value="{{ old('name') }}"></x-input>
                                    </div>
                                    <div class="grid grid-cols-1 mt-5">
                                        <x-label for="permission" value="{{ __('Permissions') }}"></x-label>
                                        @foreach($permissions as $permission)
                                            <x-checkbox name="checked[]" value="{{ $permission->id }}">
                                                {{ ucwords(str_replace('-', ' ', $permission->name)) }}
                                            </x-checkbox>
                                            <input name="permission_id[]" value="{{ $permission->id }}" hidden>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 justify-center mt-6">
                                <x-button-save>{{ __('Save') }}</x-button-save>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
