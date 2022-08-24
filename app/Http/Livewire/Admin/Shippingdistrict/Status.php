<?php

namespace App\Http\Livewire\Admin\Shippingdistrict;

use App\Models\ShippingDistrict;
use Livewire\Component;

class Status extends Component
{
    public ShippingDistrict $district;
    public string $name;
    public bool $status;

    public function mount()
    {
        $this->status = $this->district->getAttribute('status');
    }

    public function updating($name, $value)
    {
        $this->district->setAttribute($name, $value)->save();

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'District Status Updated Successfully'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.shippingdistrict.status');
    }
}
