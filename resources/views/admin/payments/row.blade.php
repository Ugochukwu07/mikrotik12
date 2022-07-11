<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-md font-medium text-gray-900">
            <a href="{{ route('users-show', $row->id) }}" class="font-bold text-indigo-500">{{ $row->user->name }}</a>
        </div>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-md font-medium text-gray-900">
            <form action="{{ route('rpt-payment-invoice') }}" method="POST">
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

<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-sm font-medium text-gray-900">
            {{ date('Y-m-d', strtotime($row->created_at)) }}
        </div>
    </div>
</x-livewire-tables::table.cell>
