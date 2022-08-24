<?php

namespace App\Http\Livewire\Admin\Shippingcountry;

use App\Models\ShippingCountry;
use Livewire\Component;

class Status extends Component
{
    public ShippingCountry $country;
    public string $name;
    public bool $status;

    public function mount()
    {
        $this->status = $this->country->getAttribute('status');
    }

    public function updating($name, $value)
    {
        $this->country->setAttribute($name, $value)->save();

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'Country Status Updated Successfully'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.shippingcountry.status');
    }
}
