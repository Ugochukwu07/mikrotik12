<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-md font-medium text-gray-900">
            {{ $row->invoice }}
        </div>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-md font-medium text-gray-900">
            {{ $row->package_name }}
        </div>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-md font-medium text-gray-900">
            @if($row->user->reseller_id)
                {{ config('app.currency') . __(' ') . $row->reseller_price }}
            @else
                {{ config('app.currency') . __(' ') . $row->user_price }}
            @endif
        </div>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-md font-medium text-gray-900">
            {{ date('Y-m-d', strtotime($row->package_start)) }}
        </div>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-md font-medium text-gray-900">
            {{ date('Y-m-d', strtotime($row->package_end)) }}
        </div>
    </div>
</x-livewire-tables::table.cell>


<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-md font-medium text-gray-900">
            {{ $row->note }}
        </div>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-sm font-medium text-gray-900">
            {{ $row->createdBy->name }}
        </div>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-sm font-medium text-gray-900">
            {{ $row->paymentMethod->name }}
        </div>
    </div>
</x-livewire-tables::table.cell>
