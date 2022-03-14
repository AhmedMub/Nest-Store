<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;

class AllCategories extends Component
{
    public $name_en;
    public $name_ar;
    public $icon;
    public $status;

    protected $rules = [];

    public function render()
    {
        return view('livewire.admin.category.all-categories')
            ->extends('admin.layouts.master')
            ->section('content');
    }
}
