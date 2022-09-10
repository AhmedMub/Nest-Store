<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;

class HeaderSearchForProducts extends Component
{
    public $categories;
    public $queryProduct = '';
    public $getProducts = [];
    public $category = 0;
    public $langAr;

    public function mount($categories, $langAr)
    {
        $this->categories = $categories;
        $this->langAr = $langAr;
    }

    public function updatedQueryProduct()
    {
        if ($this->category == 0) {
            $this->getProducts = Product::search($this->queryProduct)->get();
        } else {
            $this->getProducts = Product::whereCategoryId($this->category)->search($this->queryProduct)->get();
        }
    }

    public function render()
    {
        return view('livewire.frontend.product.header-search-for-products');
    }
}
