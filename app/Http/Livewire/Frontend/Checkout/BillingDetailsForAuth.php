<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\ShippingCountry;
use App\Models\ShippingDistrict;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BillingDetailsForAuth extends Component
{
    public $user;
    public $country;
    public $countries;
    public $districts;
    public $district;

    public function mount()
    {
        //auth user
        $this->user = Auth::user();

        $this->countries = ShippingCountry::whereStatus(1)->latest()->get();
    }

    public function update()
    {

        dd($this->district);
    }

    public function updatedCountry()
    {
        if (!empty($this->country)) {
            $this->districts = ShippingDistrict::whereCountryId($this->country)->whereStatus(1)->latest()->get();
        }
    }

    public function render()
    {
        return view('livewire.frontend.checkout.billing-details-for-auth');
    }
}
