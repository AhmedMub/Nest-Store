<?php

namespace App\Http\Livewire\Admin\Vendor;

use App\Models\Vendor;
use Livewire\Component;

class Status extends Component
{
    public Vendor $vendor;
    public string $name;
    public bool $status;

    public function mount()
    {

        $this->status = $this->vendor->getAttribute('status');
    }

    public function updating($name, $value)
    {
        $this->vendor->setAttribute($name, $value)->save();
    }
    public function render()
    {
        return view('livewire.admin.vendor.status');
    }
}
