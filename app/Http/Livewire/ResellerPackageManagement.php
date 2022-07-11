<?php

namespace App\Http\Livewire;

use App\Models\Package;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ResellerPackageManagement extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),
            Column::make("Bandwidth")
                ->sortable()
                ->searchable(),
            Column::make("Reseller price", "reseller_price")
                ->sortable()
                ->searchable(),
            Column::make("Type", "type")->sortable()
        ];
    }

    public function query(): Builder
    {
        return Package::query()->where('status', 1);
    }

    public function rowView(): string
    {
        return "reseller.package.row";
    }
}
