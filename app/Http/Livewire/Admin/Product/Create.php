<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDescription;
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

    //main to product model
    public $subCategory_id, $category_id, $subSubCategory_id, $vendor_id, $name_en, $name_ar, $qty, $price, $size, $hot_deals, $new_deals, $type, $mfg, $life, $manufacturing_date;

    //define product description
    public $short_desc_en, $short_desc_ar, $long_desc_en, $long_desc_ar, $packaging_delivery_en, $packaging_delivery_ar, $suggested_use_en, $suggested_use_ar, $other_ingredients_en, $other_ingredients_ar, $warnings_en, $warnings_ar;


    //TODO must add security regex && must add custom messages because in required it returnes field name which is risky
    protected $rules = [
        'category_id' => ['required', 'integer'],
        'subCategory_id' => ['required', 'integer'],
        'vendor_id' => ['required', 'string'],
        'name_en' => ['required', 'string'],
        'name_ar' => ['required', 'string'],
        'qty' => ['required', 'integer'],
        'price' => ['required', 'integer'],
        'type' => ['required', 'string'],
        'size' => ['nullable', 'integer'],
        'mfg' => ['required', 'date_format:Y-m-d'],
        'short_desc_en' => ['string'],
        'short_desc_ar' => ['string'],
        'long_desc_en' => ['string'],
        'long_desc_ar' => ['string'],
        'packaging_delivery_en' => ['string'],
        'packaging_delivery_ar' => ['string'],
        'suggested_use_en' => ['string'],
        'suggested_use_ar' => ['string'],
        'other_ingredients_en' => ['string'],
        'other_ingredients_ar' => ['string'],
        'warnings_en' => ['string'],
        'warnings_ar' => ['string'],
    ];

    protected $messages = [
        'name_en.required' => 'The English Name field is required',
        'name_ar.required' => 'The Arabic Name field is required',
        'category_id.required' => 'Must choose main category',
        'subCategory_id.required' => 'Must choose sub-category',
        'vendor_id.required' => 'Must choose vendor',
        'qty.required' => 'Quantity field is required',
        'price.required' => 'Price field is required',
        'type.required' => 'Type field is required',
        'mfg.required' => 'MFG field is required',
    ];

    //Create Category
    public function create()
    {
        $product = $this->validate();

        //TODO you should check with Osama is this a good way of validating the checkbox because it may be altered in client side with malicious scripts in the request

        $product_id = Product::create($product);

        //add product descriptions
        $this->productDesc($product_id->id);


        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'New product Created Successfully'
        ]);
    }

    public function productDesc($id)
    {
        ProductDescription::create([
            'product_id' => $id,
            'short_desc_en' => $this->short_desc_en,
            'short_desc_ar' => $this->short_desc_ar,
            'long_desc_en' => $this->long_desc_en,
            'long_desc_ar' => $this->long_desc_ar,
            'packaging_delivery_en' => $this->packaging_delivery_en,
            'packaging_delivery_ar' => $this->packaging_delivery_ar,
            'suggested_use_en' =>  $this->suggested_use_en,
            'suggested_use_ar' => $this->suggested_use_ar,
            'other_ingredients_en' => $this->other_ingredients_en,
            'other_ingredients_ar' => $this->other_ingredients_ar,
            'warnings_en' => $this->warnings_en,
            'warnings_ar' => $this->warnings_ar,
        ]);
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
