<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <x-card-title title="{{ __('Add ticket') }}"></x-card-title>
                <div class="flex items-center justify-center mb-32">
                    <div class="grid rounded-lg w-11/12 md:w-9/12 lg:w-2/2">
                        <form action="{{ route('tickets-store') }}" method="POST">
                            @csrf
                            <div class="md:grid md:grid-cols-3 md:gap-6">
                                <div class="md:col-span-1">
                                    <div class="flex pt-6">
                                        <h1 class="text-gray-600 font-bold md:text-2xl text-xl">{{ __('Ticket details') }}</h1>
                                    </div>
                                </div>

                                <div class="mt-5 md:mt-0 md:col-span-2">
                                    <div class="grid grid-cols-1 mt-5">
                                        <x-label for="priority" value="{{ __('Priority') }}"></x-label>
                                        <x-select name="priority">
                                            <option value="1">{{ __('High') }}</option>
                                            <option value="2">{{ __('Normal') }}</option>
                                            <option value="3">{{ __('Low') }}</option>
                                        </x-select>
                                    </div>

                                    <div class="grid grid-cols-1 mt-5">
                                        <x-label for="subject" value="{{ __('Subject') }}"></x-label>
                                        <x-input name="subject" value="{{ old('subject') }}"></x-input>
                                    </div>

                                    <div class="grid grid-cols-1 mt-5">
                                        <x-label for="message" value="{{ __('Message') }}"></x-label>
                                        <textarea name="message" class="px-3 py-3 mt-1 rounded-lg border-gray-200 md:text-sm text-xs
        focus:outline-none focus:border-indigo-300 focus:ring-indigo-600 focus:ring-opacity-50 focus:ring-2" rows="5"></textarea>
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
