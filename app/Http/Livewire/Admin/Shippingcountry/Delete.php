<?php

namespace App\Http\Livewire\Admin\Shippingcountry;

use App\Models\ShippingCountry;
use Livewire\Component;

class Delete extends Component
{
    public $country;

    protected $listeners = ['delete' => 'deleteSelected'];

    public function deleteSelected($id)
    {
        $this->country = $id;
    }

    public function delete()
    {
        ShippingCountry::findOrFail($this->country)->delete();

        $this->emit('countryDeleted');

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'Country Deleted Successfully'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.shippingcountry.delete');
    }
}
