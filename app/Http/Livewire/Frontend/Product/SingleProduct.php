<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class SingleProduct extends Component
{
    public $langAr;
    public $product;
    public $user;

    public function mount($langAr, $product, $user)
    {
        $this->langAr = $langAr;
        $this->product = $product;
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.frontend.product.single-product');
    }
}
