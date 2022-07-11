<?php

namespace App\Http\Livewire;


use App\Models\Transaction;
use App\Models\User;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class TransactionManagement extends DataTableComponent
{
    public $userId;

    public function columns(): array
    {
        return [
            Column::make('Date', 'created_at')
                ->sortable()
                ->searchable(),
            Column::make('Invoice', 'invoice')
                ->sortable()
                ->searchable(),
            Column::make('Created by', 'createdBy.name')
                ->sortable()
                ->searchable(),
            Column::make('Type', 'type')
                ->sortable()
                ->searchable(),
            Column::make('Amount', 'amount')
                ->sortable()
                ->searchable()
        ];
    }

    public function mount($id): void
    {
        $user_id = User::findOrFail($id);
        $this->userId = $user_id->id;
    }

    public function query()
    {
        return Transaction::query()
            ->where('user_id', $this->userId)
            ->latest();
    }

    public function rowView(): string
    {
        return 'admin.transactions.row';
    }
}
