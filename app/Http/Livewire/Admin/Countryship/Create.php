<?php

namespace App\Http\Livewire\Admin\Countryship;

use App\Models\CountryShip;
use App\Models\DistrictShip;
use Livewire\Component;

class Create extends Component
{
    public $country;
    public $district;

    protected $rules = [
        'country' => ['required', 'string'],
        'district' => ['required', 'string']
    ];

    protected $messages = [
        'district.required' => 'District field is required'
    ];

    public function create()
    {
        $this->validate();
        // check if the country exists
        //FIXME Attempt to read property "countryShipping" on string
        if (CountryShip::whereCountry($this->country)->exists() && $this->country->countryShipping->contains($this->district)) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => 'Chosen Record already exists'
            ]);
            return null;
        }
        $count = CountryShip::count();

        //refresh page
        if ($count <= 1) {
            redirect()->route('countryShip');
        }

        $shippingCountry = CountryShip::create([
            'country' => $this->country
        ]);

        $shippingDistrict = DistrictShip::create([
            'district' => $this->district
        ]);

        $shippingCountry->countryShipping()->attach($shippingDistrict);

        $this->emit('newCountryAdded');

        //event to reset select2 options
        $this->dispatchBrowserEvent('resetSelect');

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'New Country Added Successfully'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.countryship.create');
    }
}
