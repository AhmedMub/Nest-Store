<?php

namespace App\Http\Livewire\Admin\Areashipping;

use App\Models\AreaShipping;
use Illuminate\Support\Str;
use Livewire\Component;

class Edit extends Component
{
    public $country;
    public $district;
    public $areaId;
    public $checkCountry;

    protected $rules = [
        'country' => ['nullable', 'string'],
        'district' => ['required', 'string']
    ];

    protected $listeners = [
        'editArea' => 'edit',
    ];

    public function edit($id)
    {
        $area = AreaShipping::findOrFail($id);
        $this->areaId = $id;
        $this->district = $area->district;
        $this->dispatchBrowserEvent('openEdit');
    }

    public function update()
    {

        $this->validate();

        if (isset($this->country)) {
            //get old country
            $this->checkCountry = AreaShipping::findOrFail($this->areaId);
        }
        //get old district
        $checkDistrict = AreaShipping::findOrFail($this->areaId);

        //check if the record already exists
        if (isset($checkDistrict) && isset($this->checkCountry) && $this->checkCountry->country == $this->country && $checkDistrict->district == $this->district) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'warning',
                'message' => 'Added Record is Already Exists'
            ]);
            return null;
        }

        AreaShipping::whereId($this->areaId)->update([
            'district' => $this->district
        ]);

        if (isset($this->country) && !Str::contains($this->country, 'Select')) {
            AreaShipping::whereId($this->areaId)->update([
                'country' => $this->country
            ]);
        }

        $this->emit('shippingAreaUpdated');

        //event to reset select2 options
        $this->dispatchBrowserEvent('resetSelect');


        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Shipping Area Updated Successfully'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.areashipping.edit');
    }
}
