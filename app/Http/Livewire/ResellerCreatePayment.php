<?php

namespace App\Http\Livewire;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class ResellerCreatePayment extends Component
{
    public $selectedUser = null;
    public $selectedSubscription = null;
    public $selectedSub = null;
    public $userSubscription = null;
    public $userSub = null;

    public function render()
    {
        $users = User::whereHas('subscription', function (Builder $builder) {
            $builder->where('payment_status', 0);
        })->role('user')
            ->where('status', 1)
            ->where('reseller_id', auth()->id())
            ->get();

        return view('reseller.payments.create', compact('users'));
    }

    public function updatedSelectedUser($user_id)
    {
        $this->userSubscription = Subscription::where('user_id', $user_id)->latest()->get();
    }

    public function updatedSelectedSubscription($subscription_id)
    {
        $this->userSub = Subscription::findOrFail($subscription_id);
    }
}
