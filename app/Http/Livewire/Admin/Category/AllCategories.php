<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;

class AllCategories extends Component
{

    // public $categories;
    // protected $listeners = ['newCatAdded' => '$refresh'];

    public $cats = Category::class;

    public function columns()
    {

        return [
            NumberColumn::name('id')
                ->label('ID')
                ->defaultSort('asc')
                ->sortBy('id'),

            Column::name('name_en')
                ->label('English Name'),

            Column::name('name_ar')
                ->label('Arabic Name'),

            Column::name('icon')
                ->label('Category Icon'),

            DateColumn::name('created_at')
                ->label('Created at'),

            DateColumn::name('updated_at')
                ->label('Updated At')
        ];
    }



    public function render()
    {

        return view('livewire.admin.category.all-categories')
            ->extends('admin.layouts.master')
            ->section('content');
    }
}
