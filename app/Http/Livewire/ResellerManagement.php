<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ResellerManagement extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),
            Column::make('Company', 'company')
                ->sortable()
                ->searchable(),
            Column::make('Phone number', 'phone')
                ->sortable()
                ->searchable(),
            Column::make('E-mail', 'email')
                ->sortable()
                ->searchable(),
        ];
    }

    public function query(): Builder
    {
        return User::query()->role('reseller');
    }

    public function rowView(): string
    {
        return 'admin.reseller.row';
    }
}
