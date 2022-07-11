<x-app-layout>
    <div class="py-10">
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

                @if(auth()->user()->can('create-payment'))
                    @if(!auth()->user()->isReseller())
                        <x-card-title title="{{ __('All payments') }}" href="{{ route('payments-create') }}" awesome="fa fa-plus mr-2" text="{{ __('Create') }}"></x-card-title>
                    @endif
                    @if(auth()->user()->isReseller())
                        <x-card-title title="{{ __('All payments') }}" href="{{ route('reseller-payments-create') }}" awesome="fa fa-plus mr-2" text="{{ __('Create') }}"></x-card-title>
                    @endif
                    @if(auth()->user()->isUser())
                        <x-card-title title="{{ __('All payments') }}"></x-card-title>
                    @endif
                @endif

                @if(!auth()->user()->can('create-payment'))
                    <x-card-title title="{{ __('All payments') }}"></x-card-title>
                @endif

                <div class="p-6">
                    <div class="mx-auto">
                        <div class="mt-2">
                            <div>
                                <livewire:payment-management/>
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
