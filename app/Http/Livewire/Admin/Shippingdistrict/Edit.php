<?php

namespace App\Http\Livewire\Admin\Shippingdistrict;

use App\Models\ShippingCountry;
use App\Models\ShippingDistrict;
use Illuminate\Support\Str;
use Livewire\Component;

class Edit extends Component
{
    public $country;
    public $district;
    public $countries;
    public $districtId;

    protected function rules()
    {
        return [
            'country' => ['nullable', 'integer'],
            'district' => ['required', 'string', 'regex:/^[^<>()*?=%_${}#:;@![\]{}\/]+$/i', "unique:shipping_districts,district,$this->districtId"],
        ];
    }

    protected $listeners = [
        'edit',
    ];

    public function edit($id)
    {
        $district = ShippingDistrict::findOrFail($id);
        $this->district = $district->district;
        $this->districtId = $id;
        $this->dispatchBrowserEvent('openEdit');
    }


    public function update()
    {
        //this a fix condition because after updating district value of the country become "Select Option.."
        if (Str::contains($this->country, 'Select')) {
            $this->country = null;
        }

        $this->validate();

        //updating will decrease db requests if user update district and country together in single request this will fetch db in single call
        $updateDistrict = ShippingDistrict::findOrFail($this->districtId);

        $updateDistrict->district = $this->district;

        if (isset($this->country)) {
            $updateDistrict->country_id = $this->country;
            $updateDistrict->save();
        } else {
            $updateDistrict->save();
        }


        $this->emit('districtUpdated');

        //event to reset select2 options
        $this->dispatchBrowserEvent('resetSelect');

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Shipping District Updated Successfully'
        ]);
    }
    public function render()
    {
        $this->countries = ShippingCountry::whereStatus(1)->latest()->get();

        return view('livewire.admin.shippingdistrict.edit', [
            'countries' => $this->countries
        ]);
    }
}
