<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;

class NavbarStatus extends Component
{
    public Category $category;
    public string $name;
    public bool $navbar_status;

    public function mount()
    {

        $this->navbar_status = $this->category->getAttribute('navbar_status');
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
        return view('livewire.admin.category.navbar-status');
    }
}
