<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;

class AllCategories extends Component
{


    public function render()
    {

        return view('livewire.admin.category.all-categories')
            ->extends('admin.layouts.master')
            ->section('content');
    }
}
