<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\ShippingCountry;
use App\Models\ShippingDistrict;
use Livewire\Component;

class SelectShippingarea extends Component
{
    public $country;
    public $countries;
    public $districts;
    public $district;
    public $selectCountry;
    public $selectDistrict;

    public function mount()
    {
        //countries
        $this->countries = ShippingCountry::whereStatus(1)->latest()->get();
    }

    public function updatedCountry()
    {
        if (!empty($this->country)) {
            $this->districts = ShippingDistrict::whereCountryId($this->country)->whereStatus(1)->latest()->get();
        } else {
            $this->districts = null;
        }
    }

    public function render()
    {
        return view('livewire.frontend.checkout.select-shippingarea');
    }
}
