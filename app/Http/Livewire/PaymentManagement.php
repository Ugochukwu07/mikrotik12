<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PaymentManagement extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make('Name', 'user_id')
                ->sortable()
                ->searchable(function ($builder, $term) {
                    return $builder->orWhereHas('user', function ($query) use ($term) {
                        return $query->where('name', 'like', '%' . $term . '%');
                    });
                }),
            Column::make('Invoice', 'invoice')
                ->sortable()
                ->searchable(),
            Column::make('Package', 'package_name')
                ->searchable()
                ->sortable(),
            Column::make('Amount')
                ->sortable(),
            Column::make('Created by')
                ->sortable()
                ->searchable(function ($builder, $term) {
                    return $builder->orWhereHas('createdBy', function ($query) use ($term) {
                        return $query->where('name', 'like', '%' . $term . '%');
                    });
                }),
            Column::make('Method')
                ->sortable()
                ->searchable(function ($builder, $term) {
                    return $builder->orWhereHas('paymentMethod', function ($query) use ($term) {
                        return $query->where('name', 'like', '%' . $term . '%');
                    });
                }),
            Column::make('Created on')
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        if (auth()->user()->isReseller()) {
            return Payment::with(['user', 'paymentMethod'])->whereHas('user', function (Builder $builder) {
                $builder->where('reseller_id', auth()->id());
            });
        }

        if (auth()->user()->isUser()) {
            return Payment::with(['user', 'paymentMethod'])
                ->where('user_id', auth()->id());
        }

        if (!auth()->user()->isReseller() && !auth()->user()->isUser()) {
            return Payment::with(['user', 'paymentMethod']);
        }
    }

    public function rowView(): string
    {
        return 'admin.payments.row';
    }
}
