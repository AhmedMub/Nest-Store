<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Read extends DataTableComponent
{

    protected $model = Product::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->sortable()
                ->searchable(),
            Column::make('English Name', 'name_en')
                ->sortable()
                ->searchable(),
        ];
    }
}
