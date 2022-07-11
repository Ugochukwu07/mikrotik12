
<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-sm font-medium text-gray-900">
            <a href="{{ route('users-show', $row->id) }}" class="font-bold text-indigo-500">{{ $row->user->name }}</a>
        </div>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-sm font-medium text-gray-900">
            {{ $row->package_name }}
        </div>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-sm font-medium text-gray-900">
            @if($row->user->reseller_id)
                {{ config('app.currency') . __(' ') . $row->reseller_price }}
            @endif
            @if(!$row->user->reseller_id)
                {{ config('app.currency') . __(' ') . $row->user_price }}
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

<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-sm font-medium text-gray-900">
            {{ date('Y-m-d', strtotime($row->subscription_expires)) }}
        </div>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-sm font-medium text-gray-900">
            @if($row->user_status === 1)
                <x-badge-success>{{ __('Active') }}</x-badge-success>
            @endif

            @if($row->user_status === 2)
                <x-badge-warning>{{ __('Expired') }}</x-badge-warning>
            @endif

            @if($row->user_status === 3)
                <x-badge-danger>{{ __('Terminated') }}</x-badge-danger>
            @endif
        </div>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex items-center text-center">
        <div class="text-sm font-medium text-gray-900">
            @if($row->payment_status === 1)
                <x-badge-success>{{ __('Paid') }}</x-badge-success>
            @endif

            @if($row->payment_status === 0)
                <x-badge-danger>{{ __('Due') }}</x-badge-danger>
            @endif
        </div>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="text-sm font-medium text-gray-900">
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
        <div class="text-sm font-medium text-gray-900">
            {{ $row->createdBy->name }}
        </div>
    </div>
</x-livewire-tables::table.cell>

@if(auth()->user()->isUser())
    <x-livewire-tables::table.cell>
        <div class="flex items-center">
            <div class="text-sm font-medium text-gray-900">
                @if($row->payment_status == 0)
                    <a href="{{ route('subscriptions-show', $row->id) }}"
                       class="inline-flex items-center px-10 py-2 bg-indigo-800 rounded-md font-semibold text-xs text-white text-center">
                        {{ __('Stripe') }}
                    </a>
                @else
                    {{ __('-') }}
                @endif
            </div>
        </div>
    </x-livewire-tables::table.cell>
@endif
