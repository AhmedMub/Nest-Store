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

    public $subCategory_id, $category_id, $subSubCategory_id, $vendor_id, $name_en, $name_ar, $qty, $price, $size, $hot_deals, $new_deals, $type, $mfg, $life, $manufacturing_date, $short_desc_en, $short_desc_ar;


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
        'hot_deals' => ['string', 'min:1', 'max:2'],
        'new_deals' => ['string', 'min:1', 'max:2'],
        'mfg' => ['required', 'date_format:Y-m-d'],
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
        ProductDescription::insert([
            'product_id' => $id,
            'short_desc_en' => $this->short_desc_en,
            'short_desc_ar' => $this->short_desc_ar
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
