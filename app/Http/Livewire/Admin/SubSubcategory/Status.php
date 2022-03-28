<?php

namespace App\Http\Livewire\Admin\SubSubcategory;

use App\Models\SubSubcategory;
use Livewire\Component;

class Status extends Component
{
    public SubSubcategory $subcat;
    public string $name;
    public bool $status;

    public function mount()
    {

        $this->status = $this->subcat->getAttribute('status');
    }

    public function updating($name, $value)
    {
        $this->subcat->setAttribute($name, $value)->save();
    }

    public function render()
    {
        return view('livewire.admin.sub-subcategory.status');
    }
}
