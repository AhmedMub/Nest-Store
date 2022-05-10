<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubcategory;
use App\Models\Vendor;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;

class Create extends Component
{
    use WithFileUploads;

    /*
     ///TODO hot and new deals only one can be selected + life should be calculated in days upon the mfg date
    */

    public $subCategory_id, $category_id, $subSubCategory_id, $vendor_id, $name_en, $name_ar, $qty, $price, $size, $hot_deals, $new_deals, $type, $mfg, $life;


    //TODO must add security regex && must add custom messages because in required it returnes field name which is risky
    protected $rules = [
        'subCategory_id' => ['required', 'string', 'unique:categories'],
        'category_id' => ['required', 'string', 'unique:categories'],
        'subSubCategory_id' => ['nullable', 'image', 'max:500', 'mimes:jpeg,png,jpg,svg'],
        'vendor_id' => ['required', 'string'],
        'slug' => ['required', 'integer'],
        'name_en' => ['required', 'string'],
        'name_ar' => ['required', 'string'],
        'sku' => ['nullable', 'string'],
        'qty' => ['nullable', 'string'],
        'facebook' => ['nullable', 'string'],
        'start_date' => ['required'],
    ];

    protected $messages = [
        'name_en.required' => 'The English Name field is required',
        'name_ar.required' => 'The English Name field is required',
        'address.required' => 'The Address field is required',
        'phone.required' => 'The Phone field is required',
        'description_en.required' => 'The English Description field is required',
        'description_ar.required' => 'The Arabic Description field is required',
        'start_date.required' => 'The Start Date field is required',
    ];

    //Create Category
    public function create()
    {

        // $newVendor = $this->validate();

        // //save and resize Image if exists
        // if ($this->logo) {
        //     $newVendor;
        //     $image = $this->uploadImage();
        //     Vendor::create([
        //         'name_en' => $this->name_en,
        //         'name_ar' => $this->name_ar,
        //         'logo' => $image,
        //         'address' => $this->address,
        //         'phone' => $this->phone,
        //         'description_en' => $this->description_en,
        //         'description_ar' => $this->description_ar,
        //         'twitter' => $this->twitter,
        //         'instagram' => $this->instagram,
        //         'facebook' => $this->facebook,
        //         'start_date' => $this->start_date,
        //     ]);
        //     $this->vendorAdded();
        // } else {
        //     Vendor::create($newVendor);
        //     $this->vendorAdded();
        // }
    }

    // public function uploadImage()
    // {
    //     $image = $this->logo;

    //     $logoName = $image->hashName();

    //     $img = Image::make($image->getRealPath())->resize(136, 150, function ($constraint) {
    //         $constraint->aspectRatio();
    //         $constraint->upsize();
    //     });

    //     $img->stream();
    //     Storage::disk('frontend')->put('vendors' . '/' . $logoName, $img);

    //     return $logoName;
    // }

    // public function vendorAdded()
    // {
    //     $this->reset();

    //     $this->dispatchBrowserEvent('alert', [
    //         'type'      => 'success',
    //         'message'   => 'New Vendor Created Successfully'
    //     ]);
    // }

    public function render()
    {
        $mainCats = Category::latest()->get();
        $subCats = SubCategory::latest()->get();
        $subSubCats = SubSubcategory::latest()->get();
        $vendors = Vendor::latest()->get();

        return view('livewire.admin.product.create', compact(
            'mainCats',
            'subCats',
            'subSubCats',
            'vendors'
        ))
            ->extends('admin.layouts.master')
            ->section('content');
    }
}
