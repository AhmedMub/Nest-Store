<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\ShippingCountry;
use App\Models\ShippingDistrict;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BillingDetailsForAuth extends Component
{
    //user info
    public $userID;
    public $first_name, $last_name, $address, $addressTwo, $shippingArea_id, $postalCode, $phone, $addInfo;


    public $country;
    public $countries;
    public $districts;
    public $district;

    public function mount()
    {
        //auth user
        // $user = Auth::user();
        // $this->userID = $user->id;
        // $this->first_name = $user->first_name;
        // $this->last_name = $user->last_name;


        //countries
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
        } else {
            $this->districts = null;
        }
    }

    public function render()
    {
        return view('livewire.frontend.checkout.billing-details-for-auth');
    }
}
