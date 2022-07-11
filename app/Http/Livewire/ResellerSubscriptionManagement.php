<?php

namespace App\Http\Livewire;

use App\Models\Subscription;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class ResellerSubscriptionManagement extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make('User', 'user_id')
                ->sortable()
                ->searchable(function ($builder, $term) {
                    return $builder->orWhereHas('user', function ($query) use ($term) {
                        return $query->where('name', 'like', '%' . $term . '%');
                    });
                }),
            Column::make('Package', 'package_name')
                ->sortable()
                ->searchable(),
            Column::make('Price', 'user_price')
                ->sortable()
                ->searchable(),
            Column::make('Started', 'created_at')
                ->sortable()
                ->searchable(),
            Column::make('Expires', 'subscription_expires')
                ->sortable()
                ->searchable(),
            Column::make('User status', 'user_status')
                ->sortable()
                ->searchable(),
            Column::make('Payment status', 'payment_status')
                ->sortable()
                ->searchable(),
            Column::make('Invoice', 'invoice')
                ->sortable()
                ->searchable(),
            Column::make('Created by')
                ->sortable()
                ->searchable(function ($builder, $term) {
                    return $builder->orWhereHas('createdBy', function ($query) use ($term) {
                        return $query->where('name', 'like', '%' . $term . '%');
                    });
                }),
        ];
    }

    public function query()
    {
        return Subscription::query()->with(['user', 'package'])
            ->whereHas('user', function (Builder $builder) {
                $builder->where('reseller_id', auth()->id());
            });
    }

    public function rowView(): string
    {
        return 'reseller.subscriptions.row';
    }
}
