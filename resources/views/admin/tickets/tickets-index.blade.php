<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            @if ($message = session('success'))
                <x-flash-success>{{ $message }}</x-flash-success>
            @endif
            <div class="bg-white overflow-hidden sm:rounded-lg">
                @if(!auth()->user()->isUser())
                    <x-card-title title="{{ __('Ticket management') }}"></x-card-title>
                @endif

                @if(auth()->user()->isUser())
                    <x-card-title title="{{ __('Ticket management') }}" href="{{ route('tickets-create') }}" awesome="fa fa-plus mr-2" text="{{ __('Create') }}"></x-card-title>
                @endif

                <div class="p-6">
                    <div class="mx-auto">
                        <div class="mt-2">
                            <div>
                                <livewire:ticket-management/>
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
