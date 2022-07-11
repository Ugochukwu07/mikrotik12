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
            {{ $row->bandwidth }}
        </div>
    </div>
</x-livewire-tables::table.cell>

@if(auth()->user()->can('view-user-package-price'))
    <x-livewire-tables::table.cell>
        <div class="flex items-center">
            <div class="text-md font-medium text-gray-900">
                {{ config('app.currency') . __(' ') . $row->user_price }}
            </div>
        </div>
    </x-livewire-tables::table.cell>
@endif

@if((getSetting('using_reseller') && auth()->user()->can('view-reseller-package-price')))
    <x-livewire-tables::table.cell>
        <div class="flex items-center">
            <div class="text-md font-medium text-gray-900">
                {{ config('app.currency') . __(' ') . $row->reseller_price }}
            </div>
        </div>
    </x-livewire-tables::table.cell>
@endif

@if(auth()->user()->isUser())
    <x-livewire-tables::table.cell>
        <div class="flex items-center">
            <div class="text-md font-medium text-gray-900">
                {{ auth()->user()->reseller_id ? $row->reseller_price : $row->user_price }}
            </div>
        </div>
    </x-livewire-tables::table.cell>
@endif

@if(auth()->user()->can('view-package-status'))
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
@endif

@if(getSetting('using_mikrotik'))
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
@endif

@if(auth()->user()->can('edit-package'))
    <x-livewire-tables::table.cell>
        <div class="flex items-center">
            <div>
                <form action="{{ route('change-package-status', $row->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <a href="{{ route('packages-edit', $row->id) }}" class="mr-2 text-gray-600 inline">{{ __('Edit') }}</a>
                    @if(auth()->user()->can('deactivate-package'))
                    <x-devider></x-devider>
                        @if($row->status === 1)
                            <input type="text" name="status" value="0" hidden>
                            <button id="confirmation" type="submit" class="text-red-600 inline">{{ __('Deactivate') }}</button>
                        @endif

                        @if($row->status === 0)
                            <input type="text" name="status" value="1" hidden>
                            <button type="submit" class="text-teal-600 inline">{{ __('Activate') }}</button>
                        @endif
                    @endif
                </form>
            </div>
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
