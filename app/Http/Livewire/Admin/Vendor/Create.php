<?php

namespace App\Http\Livewire\Admin\Vendor;

use App\Models\Vendor;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;

class Create extends Component
{
    use WithFileUploads;

    public $name_en, $name_ar, $logo, $address, $phone, $description_en, $description_ar, $facebook, $instagram, $twitter, $start_date;

    //TODO must add security regex && must add custom messages because in required it returnes field name which is risky
    protected $rules = [
        'name_en' => ['required', 'string', 'unique:categories'],
        'name_ar' => ['required', 'string', 'unique:categories'],
        'logo' => ['nullable', 'image', 'max:500', 'mimes:jpeg,png,jpg,svg'],
        'address' => ['required', 'string'],
        'phone' => ['required', 'string'],
        'description_en' => ['required', 'string'],
        'description_ar' => ['required', 'string'],
        'twitter' => ['nullable', 'string'],
        'instagram' => ['nullable', 'string'],
        'facebook' => ['nullable', 'string'],
        'start_date' => ['required', 'date_format:d/m/Y'],
    ];

    protected $messages = [
        'name_en.required' => 'The English Name field is required',
        'name_ar.required' => 'The English Name field is required',
        'logo.required' => 'The English Name field is required',
        'address.required' => 'The English Name field is required',
        'phone.required' => 'The English Name field is required',
        'description_en.required' => 'The English Name field is required',
        'description_ar.required' => 'The English Name field is required',
        'twitter.required' => 'The English Name field is required',
        'instagram.required' => 'The English Name field is required',
        'facebook.required' => 'The English Name field is required',
        'start_date.required' => 'The English Name field is required',
    ];

    //Create Category
    public function create()
    {

        $newVendor = $this->validate();

        //save and resize Image if exists
        if ($this->logo) {
            $newVendor;
            $image = $this->uploadImage();
            Vendor::create([
                'name_en' => $this->name_en,
                'name_ar' => $this->name_ar,
                'logo' => $this->$image,
                'address' => $this->address,
                'phone' => $this->phone,
                'description_en' => $this->description_en,
                'description_ar' => $this->description_ar,
                'twitter' => $this->twitter,
                'instagram' => $this->instagram,
                'facebook' => $this->facebook,
                'start_date' => $start_date,
            ]);
            $this->vendorAdded();
        } else {
            Vendor::create($newVendor);
            $this->vendorAdded();
        }
    }

    public function uploadImage()
    {
        $image = $this->logo;

        $logoName = $image->hashName();

        $img = Image::make($image->getRealPath())->resize(136, 150, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $img->stream();
        Storage::disk('frontend')->put('vendors' . '/' . $logoName, $img);

        return $logoName;
    }

    public function vendorAdded()
    {
        $count = Vendor::count();

        //refresh page only if there is no data and new just added
        if ($count <= 1) {

            redirect()->route('all.cats');
        }

        $this->reset();

        $this->emit('newVendorAdded');

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'New Vendor Created Successfully'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.vendor.create');
    }
}
