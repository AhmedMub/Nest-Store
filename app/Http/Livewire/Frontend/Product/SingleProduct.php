<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class SingleProduct extends Component
{
    public $langAr;
    public $product;
    public $user;
    public $categories;
    public $latestProducts;
    public $relatedProduct;

    public function mount($relatedProduct, $latestProducts, $langAr, $product, $user, $categories)
    {
        $this->langAr = $langAr;
        $this->product = $product;
        $this->user = $user;
        $this->categories = $categories;
        $this->latestProducts = $latestProducts;
        $this->relatedProduct = $relatedProduct;
    }

    public function render()
    {
        return view('livewire.frontend.product.single-product');
    }
}
