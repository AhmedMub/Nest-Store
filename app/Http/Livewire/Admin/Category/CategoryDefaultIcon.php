<?php

namespace App\Http\Livewire\Admin\Category;

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

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'Status Updated Successfully'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.category.category-default-icon');
    }
}
