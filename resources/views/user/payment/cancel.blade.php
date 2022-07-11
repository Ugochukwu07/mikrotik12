<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <span>
                        {{ __('Your payment was cancelled. Return to ') }}
                        <a href="{{ route('dashboard') }}" class="text-indigo-500 font-bold hover:underline">{{ __('dashboard') }}</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
