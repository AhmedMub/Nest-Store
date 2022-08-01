<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class SingleProduct extends Component
{
    public $langAr;
    public $product;

    public function mount($langAr, $product)
    {
        $this->langAr = $langAr;
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.frontend.product.single-product');
    }
}
