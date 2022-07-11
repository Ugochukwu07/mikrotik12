<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <x-card-title title="{{ __('Add new item') }}"></x-card-title>
                <div class="flex items-center justify-center mb-32">
                    <div class="grid rounded-lg w-11/12 md:w-9/12 lg:w-2/2">
                        <form action="{{ route('account-store') }}" method="POST">
                            @csrf
                            <div class="md:grid md:grid-cols-3 md:gap-6">
                                <div class="md:col-span-1">
                                    <div class="flex pt-6">
                                        <h1 class="text-gray-600 font-bold md:text-xl text-xl">{{ __('Item details') }}</h1>
                                    </div>
                                </div>

                                <div class="mt-5 md:mt-0 md:col-span-2">
                                    <div class="grid grid-cols-1 mt-5">
                                        <x-label for="item" value="{{ __('Item name') }}"></x-label>
                                        <x-input name="item" value="{{ old('item') }}"></x-input>
                                    </div>

                                    <div class="grid grid-cols-1 mt-5">
                                        <x-label for="amount" value="{{ __('Amount') }}"></x-label>
                                        <x-input name="amount" value="{{ old('amount') }}" type="number"></x-input>
                                    </div>

                                    <div class="mt-5 md:mt-0 md:col-span-2">
                                        <div class="grid grid-cols-1 mt-5">
                                            <x-label for="category_id"
                                                     value="{{ __('Select a category') }}"></x-label>
                                            <x-select name="category_id">
                                                @foreach($categories as $category)
                                                    <option
                                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </x-select>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 mt-5">
                                        <x-label for="type" value="{{ __('Select type') }}"></x-label>
                                        <x-radio name="type" value="0">{{ __('Income') }}</x-radio>
                                        <x-radio name="type" value="1">{{ __('Expense') }}</x-radio>
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
