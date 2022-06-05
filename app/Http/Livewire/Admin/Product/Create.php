<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAdditionalInfo;
use App\Models\ProductDescription;
use App\Models\ProductImages;
use App\Models\SubCategory;
use App\Models\SubSubcategory;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use phpDocumentor\Reflection\Types\This;

class Create extends Component
{
    use WithFileUploads;

    /*
     ///TODO hot and new deals only one can be selected + life should be calculated in days upon the mfg date
    */

    //main to product model
    public $createdBy_adminID, $updatedBy_adminID, $subCategory_id, $category_id, $subSubCategory_id, $vendor_id, $name_en, $name_ar, $qty, $price, $size, $hot_deals, $type, $mfg, $life, $manufacturing_date;

    public $new_deals = 0;

    //define product description
    public $short_desc_en, $short_desc_ar, $long_desc_en, $long_desc_ar, $packaging_delivery_en, $packaging_delivery_ar, $suggested_use_en, $suggested_use_ar, $other_ingredients_en, $other_ingredients_ar, $warnings_en, $warnings_ar;

    //define Additional Info
    public $stand_up_en, $stand_up_ar, $folded_en, $folded_ar, $frame_en, $frame_ar, $color_en, $color_ar, $size_en;

    //define product Images
    public $mainImage;
    public $multiImgs = [];


    //TODO must add security regex && must add custom messages because in required it returnes field name which is risky
    protected $rules = [
        'category_id' => ['required', 'integer'],
        'subCategory_id' => ['required', 'integer'],
        'subSubCategory_id' => ['nullable', 'integer'],
        'vendor_id' => ['required', 'string'],
        'name_en' => ['required', 'string', 'unique:products'],
        'name_ar' => ['required', 'string', 'unique:products'],
        'qty' => ['required', 'integer'],
        'price' => ['required', 'integer'],
        'type' => ['required', 'string'],
        'size' => ['nullable', 'integer'],
        'mfg' => ['required', 'date_format:Y-m-d'],
        'short_desc_en' => ['string'],
        'short_desc_ar' => ['string'],
        'long_desc_en' => ['nullable', 'string'],
        'long_desc_ar' => ['nullable', 'string'],
        'packaging_delivery_en' => ['nullable', 'string'],
        'packaging_delivery_ar' => ['nullable', 'string'],
        'suggested_use_en' => ['nullable', 'string'],
        'suggested_use_ar' => ['nullable', 'string'],
        'other_ingredients_en' => ['nullable', 'string'],
        'other_ingredients_ar' => ['nullable', 'string'],
        'warnings_en' => ['nullable', 'string'],
        'warnings_ar' => ['nullable', 'string'],
        'stand_up_en' => ['nullable', 'string'],
        'stand_up_ar' => ['nullable', 'string'],
        'folded_en' => ['nullable', 'string'],
        'folded_ar' => ['nullable', 'string'],
        'frame_en' => ['nullable', 'string'],
        'frame_ar' => ['nullable', 'string'],
        'color_en' => ['nullable', 'string'],
        'color_ar' => ['nullable', 'string'],
        'size_en' => ['nullable', 'string'],
        'mainImage' => ['required', 'image', 'max:10000'],
        'multiImgs.*' => ['required', 'image', 'max:10000'],

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
        'mainImage.required' => 'Product main image is required',
        'multiImgs.required' => 'Product images are required',
    ];


    //Create Category
    public function create()
    {
        $this->validate();

        //for validation
        ($this->new_deals !== 1 ? $this->new_deals = 0 : "");
        ($this->hot_deals !== 1 ? $this->hot_deals = 0 : "");

        /*
            - you must specify the guard admin from which auth faceds can get the auth user because Auth default is for users table NOT admins

            * for more info visit: https://stackoverflow.com/questions/70086068/get-auth-user-id-laravel
        */
        $authAdmin = Auth::guard('admin')->user()->id;

        $product_id = Product::create([
            'createdBy_adminID' => $authAdmin,
            'updatedBy_adminID' => $authAdmin,
            'category_id' => $this->category_id,
            'subCategory_id' => $this->subCategory_id,
            'subSubCategory_id' => $this->subSubCategory_id,
            'vendor_id' => $this->vendor_id,
            'name_en' => $this->name_en,
            'name_ar' => $this->name_ar,
            'qty' => $this->qty,
            'price' => $this->price,
            'type' => $this->type,
            'size' => $this->size,
            'mfg' => $this->mfg,
            'hot_deals' => $this->hot_deals,
            'new_deals' => $this->new_deals
        ]);

        //to add the main Image
        $product_id->addMedia($this->mainImage->getRealPath())->toMediaCollection('mainImage');

        // Add the multi images to the collection
        collect($this->multiImgs)->each(
            fn ($image) =>
            $product_id->addMedia($image->getRealPath())->toMediaCollection('multiImages')
        );
        //add product descriptions
        $this->productDesc($product_id->id);

        //add product additional Info
        $this->additionalInfo($product_id->id);

        $this->reset();

        //to reset main img field
        $this->dispatchBrowserEvent('mainReset');

        //reset summernote fields
        $this->dispatchBrowserEvent('resetSummerNote');

        //to reset multi images field
        $this->dispatchBrowserEvent('multiImagesReset');

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
    public function additionalInfo($id)
    {
        ProductAdditionalInfo::create([
            'product_id' => $id,
            'stand_up_en' => $this->stand_up_en,
            'stand_up_ar' => $this->stand_up_ar,
            'folded_en' => $this->folded_en,
            'folded_ar' => $this->folded_ar,
            'frame_en' => $this->frame_en,
            'frame_ar' => $this->frame_ar,
            'color_en' => $this->color_en,
            'color_ar' => $this->color_ar,
            'size_en' => $this->size_en
        ]);
    }

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
