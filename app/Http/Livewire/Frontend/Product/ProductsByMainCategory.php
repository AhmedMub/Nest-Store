<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsByMainCategory extends Component
{
    use WithPagination;
    //Sorting
    public $sortBy = 'title_en';
    public $sortDirection = 'desc';
    public $field = 'title_en';
    public $perPage = 15;
    public $category;
    public $tags;
    public $user;
    public $langAr;

    protected $paginationTheme = 'bootstrap';


    public function mount($tags, $user, $langAr, $category)
    {
        $this->category = $category;
        $this->tags = $tags;
        $this->user = $user;
        $this->langAr = $langAr;
    }
    public function render()
    {
        $products = Product::whereProductStatus(1)->whereCategoryId($this->category->id)->latest()->paginate($this->perPage);

        $productsCount = Product::whereProductStatus(1)->whereCategoryId($this->category->id)->count();

        return view('livewire.frontend.product.products-by-main-category', compact('products', 'productsCount'));
    }
}
