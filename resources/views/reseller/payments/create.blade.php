<div>
    <div class="flex items-center justify-center mb-32">
        <div class="grid rounded-lg w-11/12 md:w-9/12 lg:w-2/2">
            <form action="{{ route('payments-store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="flex mt-5">
                            <h1 class="text-gray-600 font-bold md:text-xl text-xl">{{ __('Payment detail') }}</h1>
                        </div>
                    </div>

                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="grid grid-cols-1 mt-5">
                            <x-label for="name" value="{{ __('User') }}"></x-label>
                            <select class="px-3 py-3 mt-1 rounded-lg border-gray-200 md:text-sm text-xs" name="user_id"
                                    wire:model="selectedUser">
                                <option value="">{{ __('Select user') }}</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        @if(!is_null($userSubscription))
                            <div class="grid grid-cols-1 mt-5">
                                <x-label for="package" value="{{ __('Subscription') }}"></x-label>
                                <select class="px-3 py-3 mt-1 rounded-lg border-gray-200 md:text-sm text-xs"
                                        name="subscription_id" wire:model="selectedSubscription">
                                    <option value="">{{ __('Select subscription') }}</option>
                                    @foreach($userSubscription as $sub)
                                        <option
                                            value="{{ $sub->id }}">{{ __('Duration: ') . date('Y-m-d', strtotime($sub->created_at)) . ':' . date('Y-m-d', strtotime($sub->subscription_expires)) . __(' Billing amount: ') . ($sub->user->reseller_id ? ($sub->reseller_price + $sub->reseller_profit) : $sub->user_price) . __(' Invoice: ') . $sub->invoice }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="grid grid-cols-1 mt-5">
                                <x-label for="note" value="{{ __('Note') }}"></x-label>
                                <x-input name="note" value="{{ old('note') }}"></x-input>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="grid grid-cols-1 justify-center mt-6">
                    <x-button-save>{{ __('Save') }}</x-button-save>
                </div>
            </form>
        </div>
    </div>
</div>
