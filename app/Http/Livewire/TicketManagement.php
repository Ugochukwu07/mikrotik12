<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class TicketManagement extends DataTableComponent
{
    public function filters(): array
    {
        return [
            'priority' => Filter::make('Priority')
                ->select([
                    ''  => 'Any',
                    '1' => 'High',
                    '2' => 'Normal',
                    '3' => 'Low',
                ]),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make('Ticket ID')
                ->sortable()
                ->searchable(),
            Column::make('Subject')
                ->sortable()
                ->searchable(),
            Column::make('Status')
                ->sortable(),
            Column::make('Priority')
                ->sortable(),
            Column::make('Created at')
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        if (!auth()->user()->isReseller() && !auth()->user()->isUser()) {
            return Ticket::query()
                ->with(['user', 'comments'])
                ->when($this->getFilter('priority'), fn($query, $priority) => $query->where('priority', $priority));
        }

        if (auth()->user()->isReseller()) {
            return Ticket::query()
                ->with(['user', 'comments'])
                ->whereHas('user', function ($query){
                    $query->where('reseller_id', auth()->id());
                })
                ->when($this->getFilter('priority'), fn($query, $priority) => $query->where('priority', $priority));
        }

        if (auth()->user()->isUser()) {
            return Ticket::query()
                ->with(['user', 'comments'])
                ->where('user_id', auth()->id())
                ->when($this->getFilter('priority'), fn($query, $priority) => $query->where('priority', $priority));
        }
    }

    public function rowView(): string
    {
        return 'admin.tickets.row';
    }
}
