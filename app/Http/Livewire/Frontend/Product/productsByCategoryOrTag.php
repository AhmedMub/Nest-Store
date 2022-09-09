<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Tags\Tag;

class productsByCategoryOrTag extends Component
{
    use WithPagination;
    //Sorting
    public $sortBy = 'id';
    public $sortDirection = 'desc';
    public $field = 'id';
    public $perPage = 15;
    public $category;
    public $subCategory;
    public $subSubCategory;
    public $currentObj;
    public $vendor;
    public $getAllProducts;
    public $categories;
    public $minPrice;
    public $maxPrice;

    /*
    /--- //NOTE fix error:  properties in a livewire component can be only [numeric, string, array, null, boolean] for $products property
        //*he problem is that ::paginate() returns a "LengthAwarePaginator" instead of an "EloquentCollection", so Livewire doesn't know how to dehydrate it. As a work around, you could convert the length aware paginator to an Eloquent Collection before setting as a property.

        -//& Solution: so if we want a different type to be passed (a collection for example) we will need to make it a protected/private property
    */
    protected $products;
    public $productsCount;

    //get products by Tag
    public $byTag;
    public $tagName;

    public $tags;
    public $user;
    public $langAr;
    public $activeClass = 0;
    public $dropDownHead = 'featured';

    protected $paginationTheme = 'bootstrap';

    public function mount($tags, $user, $langAr, $category, $subCategory, $subSubCategory, $byTag, $vendor, $getAllProducts)
    {
        $this->minPrice = 0;
        $this->maxPrice = 1000;
        $this->category = $category;
        $this->subCategory = $subCategory;
        $this->subSubCategory = $subSubCategory;
        $this->tags = $tags;
        $this->user = $user;
        $this->langAr = $langAr;
        $this->byTag = $byTag;
        $this->vendor = $vendor;
        $this->getAllProducts = $getAllProducts;
        $this->categories = Category::whereStatus(1)->where('featured_category', 0)->take(5)->get();
        //
        if (isset($this->category)) {
            $this->currentObj = $this->category;
        }
        if (isset($this->subCategory)) {
            $this->currentObj = $this->subCategory;
        }
        if (isset($this->subSubCategory)) {
            $this->currentObj = $this->subSubCategory;
        }
        if (isset($this->byTag)) {
            $this->tagName = $this->byTag->name;
        }
        if (isset($this->vendor)) {
            $this->currentObj = $this->vendor;
        }
    }

    //to set products per Page
    public function resetPerPage($no)
    {
        if ($no == 0) {
            $setTo = "";
            $this->perPage = $setTo;
        } else {
            $setTo = $no;
            $this->perPage = $setTo;
        }
    }
    ///Sort products by Creation
    public function sortBySelectedField($key, $field)
    {

        if ($key == 0) {
            $this->sortDirection = 'desc';
            $this->sortBy = 'id';
        } elseif ($key == 1) {
            $this->sortDirection = 'asc';
            $this->sortBy = 'price';
        } elseif ($key == 2) {
            $this->sortDirection = 'desc';
            $this->sortBy = 'price';
        } else {
            $this->sortDirection = 'desc';
            $this->sortBy = 'created_at';
        }
        $this->activeClass = $key;
        $this->dropDownHead = $field;
    }

    public function render()
    {
        if (isset($this->category)) {
            $this->products = Product::whereProductStatus(1)->whereCategoryId($this->currentObj->id)->orderBy($this->sortBy, $this->sortDirection)->latest()->paginate($this->perPage);
            $this->productsCount = Product::whereProductStatus(1)->whereCategoryId($this->currentObj->id)->count();
        }
        if (isset($this->subCategory)) {
            $this->products = Product::whereProductStatus(1)->where('subCategory_id', $this->currentObj->id)->orderBy($this->sortBy, $this->sortDirection)->latest()->paginate($this->perPage);
            $this->productsCount = Product::whereProductStatus(1)->where('subCategory_id', $this->currentObj->id)->count();
        }
        if (isset($this->subSubCategory)) {
            $this->products = Product::whereProductStatus(1)->where('subSubCategory_id', $this->currentObj->id)->orderBy($this->sortBy, $this->sortDirection)->latest()->paginate($this->perPage);
            $this->productsCount = Product::whereProductStatus(1)->where('subSubCategory_id', $this->currentObj->id)->count();
        }
        if (isset($this->vendor)) {
            $this->products = Product::whereProductStatus(1)->where('vendor_id', $this->currentObj->id)->orderBy($this->sortBy, $this->sortDirection)->latest()->paginate($this->perPage);
            $this->productsCount = Product::whereProductStatus(1)->where('vendor_id', $this->currentObj->id)->count();
        }
        //get products by tags
        if (isset($this->byTag)) {
            $this->products = Product::withAnyTagsOfAnyType($this->tagName)->where('product_status', 1)->orderBy($this->sortBy, $this->sortDirection)->latest()->paginate($this->perPage);
            $this->productsCount = Product::withAnyTagsOfAnyType($this->tagName)->count();
        }

        //to shop all products
        if (isset($this->getAllProducts)) {
            $this->products = Product::whereProductStatus(1)->orderBy($this->sortBy, $this->sortDirection)->latest()->paginate($this->perPage);
            $this->productsCount = Product::whereProductStatus(1)->count();
        }
        return view('livewire.frontend.product.products-by-category-or-tag', [
            'products' => $this->products,
            'productsCount' => $this->productsCount
        ]);
    }
}
