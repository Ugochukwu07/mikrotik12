<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            @if ($message = session('success'))
                <x-flash-success>{{ $message }}</x-flash-success>
            @endif
            @if ($message = session('warning'))
                <x-flash-danger>{{ $message }}</x-flash-danger>
            @endif
            <div class="overflow-hidden sm:rounded-lg">
                <div class="md:flex no-wrap md:-mx-2">

                    <div class="w-full md:w-9/12 mx-2">
                        <div class="bg-white overflow-hidden sm:rounded-lg">

                            @if(auth()->user()->can('create-accounting'))
                                <x-card-title title="{{ __('Accounting') }}" href="{{ route('account-create') }}" awesome="fa fa-plus mr-2" text="{{ __('Create') }}"></x-card-title>
                            @endif

                            @if(!auth()->user()->can('create-accounting'))
                                <x-card-title title="{{ __('Accounting') }}"></x-card-title>
                            @endif

                            <div class="p-6">
                                <div class="mx-auto">
                                    <div>
                                        <livewire:account-management/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full md:w-3/12 mx-2">
                        <div class="bg-white overflow-hidden sm:rounded-lg">
                            <div class="p-6">
                                <div class="mx-auto">
                                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-2">{{ __('Categories') }}</h1>
                                    <div class="mt-2">
                                        @foreach($categories as $category)
                                            <li class="text-gray-700 font-medium my-2">{{ $category->name }}</li>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <div class="bg-white overflow-hidden sm:rounded-lg">
                                <div class="p-6">
                                    <div class="mx-auto">
                                        <h1 class="text-gray-900 font-bold text-xl leading-8 my-2">{{ __('New category') }}</h1>
                                        <div class="mt-2">
                                            <form action="{{ route('category-store') }}" method="POST">
                                                @csrf
                                                <div class="grid grid-cols-1 mt-5">
                                                    <x-label for="name" value="{{ __('Category name') }}"></x-label>
                                                    <x-input name="name" value="{{ old('name') }}"></x-input>
                                                    <div class="grid grid-cols-1 justify-center">
                                                        <x-button-save>{{ __('Save') }}</x-button-save>
                                                    </div>
                                                </div>
                                            </form>
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
        </script>
    @endpush
</x-app-layout>
