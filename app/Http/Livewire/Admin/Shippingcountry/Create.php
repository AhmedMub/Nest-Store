<?php

namespace App\Http\Livewire\Admin\Shippingcountry;

use App\Models\ShippingCountry;
use Livewire\Component;

class Create extends Component
{
    public $country;

    protected $rules = [
        'country' => ['required', 'string', 'unique:shipping_countries'],
    ];

    public function create()
    {
        $validate = $this->validate();

        $count = ShippingCountry::count();

        //refresh page
        if ($count <= 1) {
            redirect()->route('shipping.country');
        }

        ShippingCountry::create($validate);

        $this->emit('newCountryAdded');

        //event to reset select2 options
        $this->dispatchBrowserEvent('resetSelect');


        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'New Shipping Country Added Successfully'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.shippingcountry.create');
    }
}
