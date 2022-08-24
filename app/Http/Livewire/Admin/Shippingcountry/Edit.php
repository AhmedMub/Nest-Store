<?php

namespace App\Http\Livewire\Admin\Shippingcountry;

use App\Models\ShippingCountry;
use Livewire\Component;

class Edit extends Component
{
    public $country;
    public $countryId;
    public $checkCountry;

    protected $rules = [
        'country' => ['nullable', 'string', 'unique:shipping_countries'],
    ];

    protected $listeners = [
        'edit',
    ];

    public function edit($id)
    {
        $country = ShippingCountry::findOrFail($id);
        $this->country = $country->country;
        $this->countryId = $id;
        $this->dispatchBrowserEvent('openEdit');
    }

    public function update()
    {

        $validate = $this->validate();

        ShippingCountry::whereId($this->countryId)->update($validate);

        $this->emit('shippingCountryUpdated');

        //event to reset select2 options
        $this->dispatchBrowserEvent('resetSelect');


        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Shipping Country Updated Successfully'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.shippingcountry.edit');
    }
}
