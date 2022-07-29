<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;

class FeaturedCategory extends Component
{
    public Category $category;
    public string $name;
    public bool $featured_category;

    public function mount()
    {

        $this->featured_category = $this->category->getAttribute('featured_category');
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
        return view('livewire.admin.category.featured-category');
    }
}
