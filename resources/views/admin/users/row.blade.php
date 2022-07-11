<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-sm font-medium text-gray-900">
            <a href="{{ route('users-show', $row->id) }}" class="text-indigo-500 font-bold">{{ $row->name }}</a>
        </div>
    </div>
</x-livewire-tables::table.cell>

@if(getSetting('using_reseller'))
    <x-livewire-tables::table.cell>
        <div class="flex items-center">
            <div class="text-sm font-medium text-gray-900">
                {{ $row->reseller->name ?? __('N/A') }}
            </div>
        </div>
    </x-livewire-tables::table.cell>
@endif

@if(getSetting('using_customer_manager'))
    <x-livewire-tables::table.cell>
        <div class="flex items-center">
            <div class="text-sm font-medium text-gray-900">
                {{ $row->manager->name ?? __('N/A') }}
            </div>
        </div>
    </x-livewire-tables::table.cell>
@endif

@if(getSetting('using_service_zone'))
    <x-livewire-tables::table.cell>
        <div class="flex items-center">
            <div class="text-sm font-medium text-gray-900">
                {{ $row->serviceZone->name ?? __('N/A') }}
            </div>
        </div>
    </x-livewire-tables::table.cell>
@endif

<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-sm font-medium text-gray-900">
            {{ $row->subscription->package_name ?: __('N/A') }}
        </div>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-sm font-medium text-gray-900">
            {{ date('Y-m-d', strtotime($row->subscription->subscription_expires)) ?: __('N/A') }}
        </div>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-sm font-medium text-gray-900">
            @if($row->status === 1)
                <x-badge-success>{{ __('Active') }}</x-badge-success>
            @endif

            @if($row->status === 2)
                <x-badge-warning>{{ __('Expired') }}</x-badge-warning>
            @endif

            @if($row->status === 3)
                <x-badge-danger>{{ __('Terminated') }}</x-badge-danger>
            @endif
        </div>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-sm font-medium text-gray-900">
            @if($row->due_amount($row->id) === 0)
                <x-badge-info>{{ config('app.currency') . __(' ') . $row->due_amount($row->id) }}</x-badge-info>
            @endif

            @if($row->due_amount($row->id) !== 0)
                <x-badge-rose>{{ config('app.currency') . __(' ') . $row->due_amount($row->id) }}</x-badge-rose>
            @endif
        </div>
    </div>
</x-livewire-tables::table.cell>

@if(auth()->user()->can('edit-user'))
    <x-livewire-tables::table.cell>
        <div class="items-center">
            <a href="{{ route('users-edit', $row->id) }}" class="mr-2 text-gray-600">{{ __('Edit') }}</a>
            <x-devider/>
            <a href="{{ route('package-renew', $row->id) }}" class="mr-2 text-lime-900">{{ __('Renew') }}</a>
            @if(!($row->status == 3))
                <form action="{{ route('terminate-user', ['user' => $row->id]) }}" method="POST" class="text-red-600 mt-3">
                    @csrf
                    @method('PATCH')
                    <button id="confirmation">{{ __('Terminate') }}</button>
                </form>
            @endif
        </div>
    </x-livewire-tables::table.cell>
@endif

@push('scripts')
    <script>
        document.getElementById('confirmation').onclick = function () {
            return confirm("<?php echo __("Confirm package deactivation"); ?>");
        }
    </script>
@endpush
