<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsByMainCategory extends Component
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
    public $currentCat;
    public $tags;
    public $user;
    public $langAr;
    public $activeClass = 0;
    public $dropDownHead = 'featured';

    protected $paginationTheme = 'bootstrap';

    public function mount($tags, $user, $langAr, $category, $subCategory, $subSubCategory)
    {
        $this->category = $category;
        $this->subCategory = $subCategory;
        $this->subSubCategory = $subSubCategory;
        $this->tags = $tags;
        $this->user = $user;
        $this->langAr = $langAr;

        //
        if (isset($this->category)) {
            $this->currentCat = $this->category;
        }
        if (isset($this->subCategory)) {
            $this->currentCat = $this->subCategory;
        }
        if (isset($this->subSubCategory)) {
            $this->currentCat = $this->subSubCategory;
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
        $products = Product::whereProductStatus(1)->whereCategoryId($this->category->id)->orderBy($this->sortBy, $this->sortDirection)->latest()->paginate($this->perPage);

        $productsCount = Product::whereProductStatus(1)->whereCategoryId($this->category->id)->count();

        return view('livewire.frontend.product.products-by-main-category', compact('products', 'productsCount'));
    }
}
