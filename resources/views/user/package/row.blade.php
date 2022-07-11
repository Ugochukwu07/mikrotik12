<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-md font-medium text-gray-900">
            {{ $row->name }}
        </div>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-md font-medium text-gray-900">
            {{ $row->bandwidth . __('Mbps') }}
        </div>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-md font-medium text-gray-900">
            {{ config('app.currency') . __(' ') . $row->user_price }}
        </div>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-md font-medium text-gray-900">
            {{ config('app.currency') . __(' ') . $row->reseller_price }}
        </div>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-sm font-medium text-gray-900">
            @if($row->status == 1)
                <x-badge-success>{{ __('Active') }}</x-badge-success>
            @endif

            @if($row->status == 0)
                <x-badge-warning>{{ __('Inactive') }}</x-badge-warning>
            @endif
        </div>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-sm font-medium text-gray-900">
            @if($row->type === 1)
                <x-badge-rose>{{ __('PPP') }}</x-badge-rose>
            @endif

            @if($row->type === 0)
                <x-badge-purple>{{ __('HotSpot') }}</x-badge-purple>
            @endif

            @if($row->type === 2)
                <x-badge-gray>{{ __('NA') }}</x-badge-gray>
            @endif
        </div>
    </div>
</x-livewire-tables::table.cell>
