<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-md font-medium text-gray-900">
            {{ date('Y-m-d', strtotime($row->created_at)) }}
        </div>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-md font-medium text-gray-900">
            <form action="{{ route('rpt-bill-invoice') }}" method="POST">
                @csrf
                <input type="text" name="invoice" value="{{ $row->invoice }}" hidden>
                <button class="text-indigo-500 font-medium">{{ $row->invoice }}</button>
            </form>
        </div>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-md font-medium text-gray-900">
            {{ $row->createdBy->name }}
        </div>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-md font-medium text-gray-900">
            @if($row->type == 0)
                <x-badge-purple>{{ __('Subscription') }}</x-badge-purple>
            @endif

            @if($row->type == 1)
                <x-badge-success>{{ __('Payment') }}</x-badge-success>
            @endif
        </div>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-md font-medium text-gray-900">
            {{ config('app.currency') . __(' ') . $row->amount }}
        </div>
    </div>
</x-livewire-tables::table.cell>
