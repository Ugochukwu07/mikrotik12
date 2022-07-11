<?php

namespace App\Http\Livewire;

use App\Models\Package;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PackageManagement extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),
            Column::make("Bandwidth", 'bandwidth')
                ->sortable()
                ->searchable(),
            Column::make("User price", "user_price")
                ->sortable()
                ->searchable()
                ->hideIf(!auth()->user()->can('view-user-package-price')),
            Column::make("Reseller price", "reseller_price")
                ->sortable()
                ->searchable()
                ->hideIf(!getSetting('using_reseller') || !auth()->user()->can('view-reseller-package-price')),
            Column::make("Package price")
                ->sortable()
                ->searchable()
                ->hideIf(!auth()->user()->isUser()),
            Column::make("Status", "status")
                ->sortable()
                ->hideIf(!auth()->user()->can('view-package-status')),
            Column::make("Type", "type")
                ->sortable()
                ->hideIf(!getSetting('using_mikrotik')),
            Column::make("Action")
                ->hideIf(!auth()->user()->can('edit-package')),
        ];
    }

    public function query(): Builder
    {
        return Package::query();
    }

    public function rowView(): string
    {
        return "admin.package.row";
    }
}
