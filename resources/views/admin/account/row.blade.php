<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-sm font-medium text-gray-900">
            {{ $row->item }}
        </div>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-sm font-medium text-gray-900">
            {{ config('app.currency') . __(' ') . $row->amount }}
        </div>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-sm font-medium text-gray-900">
            @if($row->type === 0)
                <x-badge-success>{{ __('Income') }}</x-badge-success>
            @endif

            @if($row->type === 1)
                <x-badge-warning>{{ __('Expense') }}</x-badge-warning>
            @endif
        </div>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-sm font-medium text-gray-900">
            {{ $row->category->name }}
        </div>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-sm font-medium text-gray-900">
            {{ date('Y-m-d', strtotime($row->created_at)) }}
        </div>
    </div>
</x-livewire-tables::table.cell>


