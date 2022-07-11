<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class UserPaymentManagement extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make('Invoice', 'invoice')
                ->sortable()
                ->searchable(),
            Column::make('Package', 'package_name')
                ->searchable()
                ->sortable(),
            Column::make('Price')
                ->sortable(),
            Column::make('Start', 'package_start')
                ->sortable(),
            Column::make('End', 'package_end')
                ->sortable(),
            Column::make('Note', 'note')
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
        ];
    }

    public function query(): Builder
    {
        return Payment::with(['user', 'paymentMethod'])->where('user_id', auth()->id());
    }

    public function rowView(): string
    {
        return 'user.payment.row';
    }
}
