<?php

namespace App\Http\Livewire\Admin\Subcategory;

use App\Models\SubCategory;
use Livewire\Component;

class Status extends Component
{
    public SubCategory $category;
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
        return view('livewire.admin.subcategory.status');
    }
}
