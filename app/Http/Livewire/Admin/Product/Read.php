<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;

class Read extends DataTableComponent
{

    protected $model = Product::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        $this->setTableWrapperAttributes([
            'default' => false,
            'class' => 'table-responsive',
        ]);

        $this->setTableAttributes([
            'default' => false,
            'id' => 'basic-edit',
            'class' => 'table table-bordered border text-nowrap mb-0',
        ]);

        $this->setTheadAttributes([
            'class' => 'table-primary',
        ]);

        // Takes a callback that gives you the current row and its index
        $this->setTrAttributes(function ($row, $index) {
            if ($index % 1 === 0) {
                return [
                    'class' => 'text-center',
                ];
            }
            return [];
        });
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->sortable()
                ->searchable(),
            Column::make('Created By', 'admin.first_name')
                ->sortable()
                ->searchable(),
            Column::make('English Name', 'name_en')
                ->sortable()
                ->searchable(),
            Column::make('Main Category', 'productMainCat.name_en')
                ->sortable()
                ->searchable(),
            Column::make('Sub Category', 'productSubCat.name_en')
                ->sortable()
                ->searchable(),
            Column::make('Sub Subcategory', 'productSubSubCat.name_en')
                ->sortable()
                ->searchable(),
            Column::make('Vendor', 'productVendor.name_en')
                ->sortable()
                ->searchable(),
            ButtonGroupColumn::make('Actions')
                ->unclickable()
                ->attributes(function ($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make('My Link 1')
                        ->title(fn ($row) => 'Link 1')
                        ->location(fn ($row) => 'https://' . $row->id . 'google1.com')
                        ->attributes(function ($row) {
                            return [
                                'target' => '_blank',
                                'class' => 'underline text-blue-500',
                            ];
                        }),
                    LinkColumn::make('My Link 2')
                        ->title(fn ($row) => 'Link 2')
                        ->location(fn ($row) => 'https://' . $row->id . 'google2.com')
                        ->attributes(function ($row) {
                            return [
                                'class' => 'underline text-blue-500',
                            ];
                        }),
                    LinkColumn::make('My Link 3')
                        ->title(fn ($row) => 'Link 3')
                        ->location(fn ($row) => 'https://' . $row->id . 'google3.com')
                        ->attributes(function ($row) {
                            return [
                                'class' => 'underline text-blue-500',
                            ];
                        })
                ]),
        ];
    }
}
