<?php

namespace App\Http\Livewire\Admin\Shippingdistrict;

use App\Models\ShippingCountry;
use App\Models\ShippingDistrict;
use Livewire\Component;

class Create extends Component
{
    public $country;
    public $district;
    public $countries;

    protected $rules = [
        'country' => ['required', 'integer'],
        'district' => ['required', 'string', 'unique:shipping_districts'],
    ];

    public function create()
    {
        $this->validate();

        $count = ShippingDistrict::count();

        //refresh page
        if ($count <= 1) {
            redirect()->route('shipping.district');
        }

        ShippingDistrict::create([
            'country_id' => $this->country,
            'district' => $this->district
        ]);

        $this->emit('newDistrictAdded');

        //event to reset select2 options
        $this->dispatchBrowserEvent('resetSelect');

        $this->reset();

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'New Shipping District Added Successfully'
        ]);
    }
    public function render()
    {
        $this->countries = ShippingCountry::whereStatus(1)->latest()->get();

        return view('livewire.admin.shippingdistrict.create', [
            'countries' => $this->countries
        ]);
    }
}
