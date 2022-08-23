<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\AreaShipping;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BillingDetailsForAuth extends Component
{
    public $shippingAreas;
    public $user;
    public $country;
    public $collDistricts;
    public $districtId;

    public function mount($shippingAreas)
    {
        $this->shippingAreas = $shippingAreas;

        //auth user
        $this->user = Auth::user();

        $this->collDistricts = collect();
    }

    public function update()
    {

        dd($this->districtId);
    }

    public function updatedCountry()
    {
        //using laravel collection
        $getCountry = AreaShipping::findOrFail($this->country)->country;

        $this->collDistricts->push(AreaShipping::whereCountry($getCountry)->get())->all();
    }

    public function render()
    {
        return view('livewire.frontend.checkout.billing-details-for-auth');
    }
}
