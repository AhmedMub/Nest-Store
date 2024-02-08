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

    // to remove search by category for mobile
    public $active;

    public function mount($categories, $langAr)
    {
        $this->categories = $categories;
        $this->langAr = $langAr;
    }

    public function updatedQueryProduct()
    {
        // if category property is 0 this will return all the products matching in search() method
        if ($this->category == 0) {
            $this->getProducts = Product::search($this->queryProduct)->get();
        } else {
            // category property updated with the select2 of a specific category ID, search() will return the products matching related to selected category
            $this->getProducts = Product::whereCategoryId($this->category)->search($this->queryProduct)->get();
        }
    }

    public function render()
    {
        return view('livewire.frontend.product.header-search-for-products');
    }
}
