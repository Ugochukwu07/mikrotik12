<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class UserManagement extends DataTableComponent
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
            Column::make('Reseller', 'reseller_id')
                ->sortable()
                ->hideIf(!getSetting('using_reseller')),
            Column::make('Manager', 'manager_id')
                ->sortable()
                ->hideIf(!getSetting('using_customer_manager')),
            Column::make('Service zone', 'service_zone_id')
                ->sortable()
                ->hideIf(!getSetting('using_service_zone')),
            Column::make('Package')
                ->sortable()
                ->searchable(function ($builder, $term) {
                    return $builder->orWhereHas('subscription', function ($query) use ($term) {
                        return $query->where('package_name', 'like', '%' . $term . '%');
                    });
                }),
            Column::make('Expire', 'subscription.subscription_expires')
                ->sortable(),
            Column::make('Status', 'status')
                ->sortable(),
            Column::make('Due')
                ->sortable(),
            Column::make('Action'),
        ];
    }

    public function query(): Builder
    {
        if (!auth()->user()->isReseller())
        {
            return User::query()
            ->role('user')
            ->with(['subscription', 'reseller'])
            ->when($this->getFilter('status'), fn ($query, $status) => $query->where('status', $status));
        }

        if (auth()->user()->isReseller())
        {
            return User::query()
                ->role('user')
                ->with(['subscription'])
                ->where('reseller_id', auth()->id())
                ->when($this->getFilter('status'), fn ($query, $status) => $query->where('status', $status));
        }
    }

    public function rowView(): string
    {
        return 'admin.users.row';
    }
}
