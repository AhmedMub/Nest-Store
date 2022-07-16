<?php

namespace App\Http\Livewire\Admin\SubSubcategory;

use App\Models\SubSubcategory;
use Livewire\Component;

class NavbarStatus extends Component
{
    public SubSubcategory $subcat;
    public string $name;
    public bool $navbar_status;

    public function mount()
    {
        $this->navbar_status = $this->subcat->getAttribute('navbar_status');
    }

    public function updating($name, $value)
    {

        $this->subcat->setAttribute($name, $value)->save();

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'Status Updated Successfully'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.sub-subcategory.navbar-status');
    }
}
