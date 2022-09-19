<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAdditionalInfo;
use App\Models\ProductDescription;
use App\Models\ProductDiscount;
use App\Models\ProductExpiration;
use App\Models\SubCategory;
use App\Models\SubSubcategory;
use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $product_id;

    //main to product model
    public $createdBy_adminID, $updatedBy_adminID, $category_id, $subCategory_id, $subSubCategory_id, $vendor_id, $mainCatN, $subCatN, $vendorName, $subSubCatN, $name_en, $name_ar, $qty, $price, $size, $type, $mfg, $exp, $life, $manufacturing_date;

    public $getSubCats = "";
    public $getSubSubCats = "";

    //define product description
    public $short_desc_en, $short_desc_ar, $long_desc_ar, $long_desc_en;
    // public  $packaging_delivery_en, $packaging_delivery_ar, $suggested_use_en, $suggested_use_ar, $other_ingredients_en, $other_ingredients_ar, $warnings_en, $warnings_ar;

    //define Additional Info
    public $stand_up_en, $stand_up_ar, $folded_en, $folded_ar, $frame_en, $frame_ar, $color_en, $color_ar, $size_en;

    //define product Images
    public $mainImage;
    public $multiImgs = [];

    protected $listeners = ['editProduct' => 'edit'];

    protected function rules()
    {
        return [
            'category_id' => ['required', 'integer'],
            'subCategory_id' => ['nullable', 'integer'],
            'subSubCategory_id' => ['nullable', 'integer'],
            'vendor_id' => ['required', 'integer'],
            'name_en' => ['required', 'string', 'regex:/^[a-z0-9\s]*$/i', "unique:products,name_en,$this->product_id"],
            'name_ar' => ['required', 'string', 'regex:/^[a-z0-9\s]*$/i', "unique:products,name_ar,$this->product_id"],
            'qty' => ['required', 'integer'],
            'price' => ['required', 'between:0,99.99'],
            'type' => ['required', 'string'],
            'size' => ['nullable', 'integer'],
            'mfg' => ['required', 'date_format:Y-m-d'],
            'exp' => ['required', 'date_format:Y-m-d'],
            'short_desc_en' => ['string', 'regex:/^[a-z0-9\s]*$/i'],
            'short_desc_ar' => ['string', 'regex:/^[a-z0-9\s]*$/i'],
            'long_desc_en' => ['nullable', 'string'],
            'long_desc_ar' => ['nullable', 'string'],
            // 'packaging_delivery_en' => ['nullable', 'string'],
            // 'packaging_delivery_ar' => ['nullable', 'string'],
            // 'suggested_use_en' => ['nullable', 'string'],
            // 'suggested_use_ar' => ['nullable', 'string'],
            // 'other_ingredients_en' => ['nullable', 'string'],
            // 'other_ingredients_ar' => ['nullable', 'string'],
            // 'warnings_en' => ['nullable', 'string'],
            // 'warnings_ar' => ['nullable', 'string'],
            'stand_up_en' => ['nullable', 'string', 'regex:/^[a-z0-9\s]*$/i'],
            'stand_up_ar' => ['nullable', 'string', 'regex:/^[a-z0-9\s]*$/i'],
            'folded_en' => ['nullable', 'string', 'regex:/^[a-z0-9\s]*$/i'],
            'folded_ar' => ['nullable', 'string', 'regex:/^[a-z0-9\s]*$/i'],
            'frame_en' => ['nullable', 'string', 'regex:/^[a-z0-9\s]*$/i'],
            'frame_ar' => ['nullable', 'string', 'regex:/^[a-z0-9\s]*$/i'],
            'color_en' => ['nullable', 'string', 'regex:/^[a-z0-9\s]*$/i'],
            'color_ar' => ['nullable', 'string', 'regex:/^[a-z0-9\s]*$/i'],
            'size_en' => ['nullable', 'string', 'regex:/^[a-z0-9\s]*$/i'],
        ];
    }

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
        'exp.required' => 'EXP field is required',
    ];

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->product_id = $id;
        $this->mainCatN = $product->productMainCat->name_en;
        $this->category_id = $product->productMainCat->id;


        //this is incase the subcategory is null
        if (!is_null($product->subCategory_id)) {
            $this->getSubCats = SubCategory::where('category_id', $this->category_id)->latest()->get();
            $this->subCategory_id = $product->productSubCat->id;
            $this->subCatN = $product->productSubCat->name_en;
        }

        //this is incase sub subcategory is null
        if (!is_null($product->subSubCategory_id)) {
            //$this->getSubSubCats = SubSubcategory::where('subcategory_id', $this->subCategory_id)->latest()->get();
            $this->subSubCategory_id = $product->productSubSubCat->id;
            $this->subSubCatN = $product->productSubSubCat->name_en;
        }
        $this->vendor_id = $product->productVendor->id;
        $this->vendorName = $product->productVendor->name_en;
        $this->name_en = $product->name_en;
        $this->name_ar = $product->name_ar;
        $this->qty = $product->qty;
        $this->price = $product->price;
        $this->type = $product->type;
        $this->size =  $product->size;
        $this->mfg = $product->productDates->mfg;
        $this->exp = $product->productDates->exp;
        $this->short_desc_en = $product->productDescriptions->short_desc_en;
        $this->short_desc_ar = $product->productDescriptions->short_desc_ar;
        $this->long_desc_en = $product->productDescriptions->long_desc_en;
        $this->long_desc_ar = $product->productDescriptions->long_desc_ar;
        // $this->packaging_delivery_en = $product->productDescriptions->packaging_delivery_en;
        // $this->packaging_delivery_ar = $product->productDescriptions->packaging_delivery_ar;
        // $this->suggested_use_en = $product->productDescriptions->suggested_use_en;
        // $this->suggested_use_ar = $product->productDescriptions->suggested_use_ar;
        // $this->other_ingredients_en = $product->productDescriptions->other_ingredients_en;
        // $this->other_ingredients_ar = $product->productDescriptions->other_ingredients_ar;
        // $this->warnings_en = $product->productDescriptions->warnings_en;
        // $this->warnings_ar = $product->productDescriptions->warnings_ar;
        $this->stand_up_en = $product->productAdditionalInfo->stand_up_en;
        $this->stand_up_ar = $product->productAdditionalInfo->stand_up_ar;
        $this->folded_en = $product->productAdditionalInfo->folded_en;
        $this->folded_ar = $product->productAdditionalInfo->folded_ar;
        $this->frame_en = $product->productAdditionalInfo->frame_en;
        $this->frame_ar = $product->productAdditionalInfo->frame_ar;
        $this->color_en = $product->productAdditionalInfo->color_en;
        $this->color_ar = $product->productAdditionalInfo->color_ar;
        $this->size_en = $product->productAdditionalInfo->size_en;

        //send above info to be rendered using summerNote
        $this->dispatchBrowserEvent('getProductInfo');
    }

    //getSubCategory
    public function updatedCategoryId($id)
    {
        //remove the old value if there is any subcat id and subSubcat id
        $this->subCategory_id = "";
        $this->subSubCategory_id = "";

        $this->getSubCats = SubCategory::where('category_id', $id)->latest()->get();

        //remove the old value if there is any
        $this->getSubSubCats = "";
    }

    //getSubSubCategory
    public function updatedSubCategoryId($id)
    {
        //when changing option for subcategory the subSubcategory_id should be empty or remove the old value if there is any
        $this->subSubCategory_id = "";

        $this->getSubSubCats = SubSubcategory::where('subcategory_id', $id)->latest()->get();
    }

    //Update Category
    public function update()
    {
        $this->validate();

        /*
            =>this to check if product mfg less than or grater than exp date.
            $mfgData->diffInDays($expDate) == 0 => check if user insert duplicate dates for each mfg and exp as this should result "Invalid dates"
            $mfgData->gt($expDate) => gt: is grater than if mfg grater than exp
                        Example: 3/8/2022 > 2/8/2022
                        this will cause error "invalid" as this should be false mfg must be less than exp
        */
        $mfgData = Carbon::parse($this->mfg);
        $expDate = Carbon::parse($this->exp);

        if ($mfgData->diffInDays($expDate) == 0 || $mfgData->gt($expDate)) {
            //dd(Carbon::now()->diffInDays(Carbon::parse($this->exp)));
            $this->dispatchBrowserEvent('alert', [
                'type'      => 'error',
                'message'   => 'Product Dates Are Invalid'
            ]);
            return null;
        }



        //check if admin choose subcategory and subSubcategory
        if (!$this->subCategory_id) {
            $this->subCategory_id = null;
        }
        if (!$this->subSubCategory_id) {
            $this->subSubCategory_id = null;
        }

        $authAdmin = Auth::guard('admin')->user()->id;
        $selectedProduct = Product::findOrFail($this->product_id);
        //update selected product
        $selectedProduct->update([
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
        ]);

        //to update the main Image
        if ($this->mainImage) {
            $selectedProduct->addMedia($this->mainImage->getRealPath())->withResponsiveImages()->toMediaCollection('mainImage');
        }

        // update the multi images to the collection
        if ($this->multiImgs) {
            $selectedProduct->clearMediaCollection('multiImages');
            collect($this->multiImgs)->each(
                fn ($image) =>
                $selectedProduct->addMedia($image->getRealPath())->withResponsiveImages()->toMediaCollection('multiImages')
            );
        }

        //update product dates
        $this->productDates($this->product_id);

        //add product descriptions
        $this->productDesc($this->product_id);

        //update product additional Info
        $this->additionalInfo($this->product_id);

        //update product discount if price changed according to discount that is exists
        $this->updateDiscountedPrice($this->product_id);

        //to reset multi images field
        $this->dispatchBrowserEvent('multiImagesReset');

        //to reset main img field
        $this->dispatchBrowserEvent('mainReset');

        $this->emit('productUpdated');

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'product Updated Successfully'
        ]);
    }

    public function productDates($id)
    {
        ProductExpiration::whereProductId($id)->update([
            'mfg' => $this->mfg,
            'exp' => $this->exp
        ]);
    }

    public function productDesc($id)
    {
        ProductDescription::whereProductId($id)->update([
            'short_desc_en' => $this->short_desc_en,
            'short_desc_ar' => $this->short_desc_ar,
            'long_desc_en' => $this->long_desc_en,
            'long_desc_ar' => $this->long_desc_ar,
            // 'packaging_delivery_en' => $this->packaging_delivery_en,
            // 'packaging_delivery_ar' => $this->packaging_delivery_ar,
            // 'suggested_use_en' =>  $this->suggested_use_en,
            // 'suggested_use_ar' => $this->suggested_use_ar,
            // 'other_ingredients_en' => $this->other_ingredients_en,
            // 'other_ingredients_ar' => $this->other_ingredients_ar,
            // 'warnings_en' => $this->warnings_en,
            // 'warnings_ar' => $this->warnings_ar,
        ]);
    }
    public function additionalInfo($id)
    {
        ProductAdditionalInfo::whereProductId($id)->update([
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

    public function updateDiscountedPrice($id)
    {
        $product = Product::findOrFail($id);
        if (isset($product->productDiscount->discount_percent)) {
            $productDiscountId = Product::findOrFail($id)->productDiscount->id;
            $priceAfterDiscount = floatval(round($this->price - ($this->price * ($product->productDiscount->discount_percent / 100))));
            ProductDiscount::findOrFail($productDiscountId)->update([
                'discounted_price' => $priceAfterDiscount,
            ]);
        }
    }

    public function render()
    {
        $mainCats = Category::latest()->get();
        $subCats = SubCategory::latest()->get();
        $subSubCats = SubSubcategory::latest()->get();
        $vendors = Vendor::latest()->get();

        return view('livewire.admin.product.edit', compact(
            'mainCats',
            'subCats',
            'subSubCats',
            'vendors'
        ));
    }
}
