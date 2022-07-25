<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsBySubCategory extends Component
{
    use WithPagination;
    //Sorting
    public $sortBy = 'title_en';
    public $sortDirection = 'desc';
    public $field = 'title_en';
    public $perPage = 5;
    public $subCategory;
    public $tags;
    public $user;
    public $langAr;

    protected $paginationTheme = 'bootstrap';


    public function mount($tags, $user, $langAr, $subCategory)
    {
        $this->subCategory = $subCategory;
        $this->tags = $tags;
        $this->user = $user;
        $this->langAr = $langAr;
    }
    public function render()
    {
        $products = Product::whereProductStatus(1)->where('subCategory_id', $this->subCategory->id)->paginate($this->perPage);

        return view('livewire.frontend.product.products-by-sub-category', compact('products'));
    }
}
