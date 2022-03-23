<?php

namespace App\Http\Livewire\Admin\Category\Crud;

use App\Models\Category;
use Livewire\Component;

class CategoryDefaultIcon extends Component
{
    public Category $category;
    public string $name;
    public bool $default_icon_status;

    public function mount()
    {

        $this->default_icon_status = $this->category->getAttribute('default_icon_status');
    }

    public function updating($name, $value)
    {

        $this->category->setAttribute($name, $value)->save();
    }
    public function render()
    {
        return view('livewire.admin.category.crud.category-default-icon');
    }
}
