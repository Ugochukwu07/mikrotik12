<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Spatie\Permission\Models\Role;

class StaffManagement extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),
            Column::make('E-mail', 'email')
                ->sortable()
                ->searchable(),
            Column::make('Phone', 'phone')
                ->sortable()
                ->searchable(),
            Column::make('Role')
                ->sortable(),
            Column::make('Action')
        ];
    }

    public function query(): Builder
    {
        $roles = Role::whereNotIn('name', ['admin', 'reseller', 'user'])->get();

        return User::query()
            ->role($roles)
            ->with('serviceZone');
    }

    public function rowView(): string
    {
        return 'admin.staff.row';
    }
}
