<?php

namespace App\Http\Livewire\Admin\Vendor;

use App\Models\Vendor;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $vendorId, $name_en, $name_ar, $address, $phone, $description_en, $description_ar, $facebook, $instagram, $twitter, $start_date;
    public $logo;

    protected $listeners = [
        'editVendor',
    ];

    //TODO must add security regex && must add custom messages because in required it returnes field name which is risky
    protected function rules()
    {
        return [
            'name_en' => ['required', 'string', "unique:vendors,name_en,$this->vendorId"],
            'name_ar' => ['required', 'string', "unique:vendors,name_ar,$this->vendorId"],
            'address' => ['required', 'string'],
            'phone' => ['required', 'integer'],
            'description_en' => ['required', 'string'],
            'description_ar' => ['required', 'string'],
            'twitter' => ['nullable', 'string'],
            'instagram' => ['nullable', 'string'],
            'facebook' => ['nullable', 'string'],
            'start_date' => ['required'],
            //logo nullable because user may not want to update logo on update info
            'logo' => ['nullable', 'image', 'max:10000'],
        ];
    }

    protected $messages = [
        'name_en.required' => 'The English Name field is required',
        'name_ar.required' => 'The Arabic Name field is required',
        'address.required' => 'The Address field is required',
        'phone.required' => 'The Phone field is required',
        'description_en.required' => 'The English Description field is required',
        'description_ar.required' => 'The Arabic Description field is required',
        'start_date.required' => 'The Start Date field is required',
    ];


    public function editVendor($id)
    {
        $vendor = Vendor::findOrFail($id);
        $this->vendorId = $id;
        $this->name_en = $vendor->name_en;
        $this->name_ar = $vendor->name_ar;
        $this->address = $vendor->address;
        $this->phone = $vendor->phone;
        $this->description_en = $vendor->description_en;
        $this->description_ar = $vendor->description_ar;
        $this->twitter = $vendor->twitter;
        $this->instagram = $vendor->instagram;
        $this->facebook = $vendor->facebook;
        $this->start_date = $vendor->start_date;
    }

    public function update()
    {
        $validate = $this->validate();

        $vendor = Vendor::findOrFail($this->vendorId);

        $vendor->update($validate);

        $this->uploadImage($vendor);

        $this->emit('vendorUpdated');

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Vendor Updated Successfully',
        ]);
    }

    public function uploadImage($vendor)
    {
        //to add the slider Image if slider updated the old image will be replaced with the updated
        if (isset($this->logo)) {
            $vendor->addMedia($this->logo->getRealPath())
                ->withResponsiveImages()
                ->toMediaCollection('vendorLogo');
        }

        //to reset main img field
        $this->dispatchBrowserEvent('ResetImage');
    }

    public function render()
    {
        return view('livewire.admin.vendor.edit');
    }
}
