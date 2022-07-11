<?php

namespace App\Http\Livewire;

use App\Classes\Mikrotik;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use RouterOS\Query;

class MikrotikPPPUser extends DataTableComponent
{
    protected Mikrotik $checkMikrotikConnection;

    public function mount(): void
    {
        $this->checkMikrotikConnection = new Mikrotik();
    }

    public function columns(): array
    {
        return [
            Column::make('ID')
                ->sortable()
                ->searchable(),
            Column::make('Name')
                ->sortable()
                ->searchable(),
            Column::make('Uptime')
                ->sortable(),
            Column::make('Uptime')
                ->sortable(),
            Column::make('Bytes in')
                ->sortable(),
            Column::make('Bytes out')
                ->sortable(),
            Column::make('Packets in')
                ->sortable(),
            Column::make('Packets out')
                ->sortable(),
            Column::make('Dynamic')
                ->sortable(),
            Column::make('Disabled')
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        $query = new Query("/ppp/secret/print");
        return $this->checkMikrotikConnection->checkConnection()->query($query)->read();
    }

    public function rowView(): string
    {
        return 'admin.mikrotik.functions.ppp-users-row';
    }
}
