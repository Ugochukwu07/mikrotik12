<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class ResellerUserManagement extends DataTableComponent
{
    public function filters(): array
    {
        return [
            'status' => Filter::make('Status')
                ->select([
                    '' => 'Any',
                    '1' => 'Active',
                    '2' => 'Expired',
                    '3' => 'Terminated',
                ]),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),
            Column::make('E-mail', 'email')
                ->sortable()
                ->searchable(),
            Column::make('Package')
                ->sortable()
                ->searchable(function ($builder, $term) {
                    return $builder->orWhereHas('subscription', function ($query) use ($term) {
                        return $query->where('package_name', 'like', '%' . $term . '%');
                    });
                }),
            Column::make('Status', 'status')
                ->sortable(),
            Column::make('Expiring')
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        return User::query()
            ->role('user')
            ->with(['subscription'])
            ->where('reseller_id', auth()->id())
            ->when($this->getFilter('status'), fn ($query, $status) => $query->where('status', $status));
    }

    public function getTableRowUrl($row): string
    {
        return route('users-show', $row);
    }

    public function rowView(): string
    {
        return 'reseller.users.row';
    }
}
