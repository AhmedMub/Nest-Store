<?php

namespace App\Http\Livewire\Admin\Vendor;

use App\Models\Vendor;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;

class Edit extends Component
{
    use WithFileUploads;

    public $vendorId, $name_en, $name_ar, $logo, $address, $phone, $description_en, $description_ar, $facebook, $instagram, $twitter, $start_date;

    protected $listeners = [
        'editVendor',
    ];

    //TODO must add security regex && must add custom messages because in required it returnes field name which is risky
    protected function rules()
    {
        return [
            'name_en' => ['required', 'string', "unique:vendors,name_en,$this->vendorId"],
            'name_ar' => ['required', 'string', "unique:vendors,name_ar,$this->vendorId"],
            'logo' => ['nullable', 'image', 'max:500', 'mimes:jpeg,png,jpg,svg'],
            'address' => ['required', 'string'],
            'phone' => ['required', 'integer'],
            'description_en' => ['required', 'string'],
            'description_ar' => ['required', 'string'],
            'twitter' => ['nullable', 'string'],
            'instagram' => ['nullable', 'string'],
            'facebook' => ['nullable', 'string'],
            'start_date' => ['required'],
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
        $this->vendorId = $vendor->id;
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
        $this->validate();

        $vendorLogo = $this->uploadImage();

        Vendor::whereId($this->vendorId)->update([
            'name_en' => $this->name_en,
            'name_ar' => $this->name_ar,
            'address' => $this->address,
            'phone' => $this->phone,
            'logo' => $vendorLogo,
            'description_en' => $this->description_en,
            'description_ar' => $this->description_ar,
            'twitter' => $this->twitter,
            'instagram' => $this->instagram,
            'facebook' => $this->facebook,
            'start_date' => $this->start_date,
        ]);

        $this->emit('vendorUpdated');

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Vendor Updated Successfully',
        ]);
    }

    public function uploadImage()
    {
        if ($this->logo) {

            $oldImage = Vendor::findOrFail($this->vendorId)->logo;

            //check if logo field not null
            if ($oldImage !== null) {
                Storage::delete('public/frontend/vendors/' . $oldImage);
            }

            $image = $this->logo;

            $imageName = $image->hashName();

            $img = Image::make($image->getRealPath())->resize(136, 150, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $img->stream();
            Storage::disk('frontend')->put('vendors' . '/' . $imageName, $img);
        }

        return $imageName;
    }

    public function render()
    {
        return view('livewire.admin.vendor.edit');
    }
}
