<?php

namespace App\Http\Livewire\Frontend\Product;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class ProductsByCategory extends Component
{
    public $category, $tags, $products, $user, $langAr, $catName;

    public function mount($category, $tags, $products, $user, $langAr, $catName)
    {
        $this->category = $category;
        $this->tags = $tags;
        $this->products = $products;
        $this->user = $user;
        $this->langAr = $langAr;
        $this->catName = $catName;
    }
    public function render()
    {
        return view('livewire.frontend.product.products-by-category');
    }
}
