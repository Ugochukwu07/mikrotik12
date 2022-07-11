<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-sm font-medium text-gray-900">
            <a href="{{ route('tickets-show', $row->id) }}" class="font-bold text-indigo-500">{{ __('#') . $row->ticketId }}</a>
        </div>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-sm font-medium text-gray-900">
            {{ $row->subject }}
        </div>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-sm font-medium text-gray-900">
            @if($row->status === 1)
                <x-badge-rose>{{ __('Open') }}</x-badge-rose>
            @endif
            @if($row->status === 0)
                <x-badge-gray>{{ __('Closed') }}</x-badge-gray>
            @endif
        </div>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-sm font-medium text-gray-900">
            @if($row->priority === 1)
                <x-badge-danger>{{ __('High') }}</x-badge-danger>
            @endif
            @if($row->priority === 2)
                <x-badge-info>{{ __('Normal') }}</x-badge-info>
            @endif
            @if($row->priority === 3)
                <x-badge-success>{{ __('Low') }}</x-badge-success>
            @endif
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
