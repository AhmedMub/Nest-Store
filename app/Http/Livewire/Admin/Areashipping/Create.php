<?php

namespace App\Http\Livewire\Admin\Areashipping;

use App\Models\AreaShipping;
use Livewire\Component;

class Create extends Component
{
    public $country;
    public $district;

    protected $rules = [
        'country' => ['required', 'string'],
        'district' => ['required', 'string']
    ];

    public function create()
    {
        $validate = $this->validate();

        $checkCountry = AreaShipping::where('country', '=', $this->country)->first();
        $checkDistrict = AreaShipping::where('district', '=', $this->district)->first();

        //check if the record already exists
        if (isset($checkDistrict) && isset($checkCountry) && $checkCountry->country == $this->country && $checkDistrict->district == $this->district) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'warning',
                'message' => 'Added Record is Already Exists'
            ]);
            return null;
        }

        $count = AreaShipping::count();

        //refresh page
        if ($count <= 1) {
            redirect()->route('shippingArea');
        }

        AreaShipping::create($validate);
        $this->reset();

        $this->emit('newShippingAreaAdded');

        //event to reset select2 options
        $this->dispatchBrowserEvent('resetSelect');


        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'New Shipping Area Added Successfully'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.areashipping.create');
    }
}
