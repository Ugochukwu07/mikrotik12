<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            @if ($message = session('success'))
                <x-flash-success>{{ $message }}</x-flash-success>
            @endif

            <div class="bg-white overflow-hidden sm:rounded-lg">
                <x-card-title title="{{ __('Settings') }}"></x-card-title>
                <div class="flex items-center justify-center mb-32">
                    <div class="grid rounded-lg w-12/12 md:w-9/12 lg:w-2/2">
                        <form action="{{ route('settings-update', $settings->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="md:grid md:grid-cols-3 md:gap-6 mt-10">
                                <div class="md:col-span-1">
                                    <div class="flex pt-1">
                                        <h1 class="text-gray-600 font-medium md:text-xl text-xl">{{ __('Application') }}</h1>
                                    </div>
                                </div>

                                <div class="md:mt-0 md:col-span-2">
                                    <div class="grid grid-cols-1">
                                        <x-label for="body" value="{{ __('Mail body text') }}"></x-label>
                                        <x-input name="body" value="{{ old('body') }}"></x-input>
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

    @push('scripts')
        <script>
            setTimeout(function () {
                document.getElementById('msg').remove();
            }, 5000);
        </script>
    @endpush
</x-app-layout>
