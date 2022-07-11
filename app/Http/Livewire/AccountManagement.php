<?php

namespace App\Http\Livewire;

use App\Models\Account;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class AccountManagement extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make('Item', 'item')
                ->sortable()
                ->searchable(),
            Column::make('Amount', 'amount')
                ->sortable()
                ->searchable(),
            Column::make('Type', 'type')
                ->sortable(),
            Column::make('Category', 'category_id')
                ->sortable(),
            Column::make('Created on', 'created_at')
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        return Account::query()
        ->with('category');
    }

    public function rowView(): string
    {
        return 'admin.account.row';
    }
}
