<?php

namespace App\Http\Livewire\Admin\Category\Crud;

use App\Models\Category;
use Livewire\Component;

class Status extends Component
{
    public Category $category;
    public string $name;
    public bool $status;

    public function mount()
    {

        $this->status = $this->category->getAttribute('status');
    }

    public function updating($name, $value)
    {

        $this->category->setAttribute($name, $value)->save();
    }

    public function render()
    {
        return view('livewire.admin.category.crud.status');
    }
}
