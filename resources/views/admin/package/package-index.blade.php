<x-app-layout>
    @if(auth()->user()->can('view-package'))
        <div class="py-10">
            <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                @if ($message = session('success'))
                    <x-flash-success>{{ $message }}</x-flash-success>
                @endif
                    @if ($message = session('danger'))
                        <x-flash-success>{{ $message }}</x-flash-success>
                    @endif
                    @if ($message = session('warning'))
                        <x-flash-success>{{ $message }}</x-flash-success>
                    @endif

                <div class="bg-white overflow-hidden sm:rounded-lg">
                    @if(auth()->user()->can('create-package'))
                        <x-card-title title="{{ __('Package management') }}" href="{{ route('packages-create') }}" awesome="fa fa-plus mr-2" text="{{ __('Create') }}"></x-card-title>
                    @endif

                    @if(!auth()->user()->can('create-package'))
                        <x-card-title title="{{ __('Package management') }}"></x-card-title>
                    @endif
                    <div class="p-6">
                        <div class="mx-auto">
                            <div class="mt-2">
                                <div>
                                    <livewire:package-management/>
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
    @endif
</x-app-layout>
