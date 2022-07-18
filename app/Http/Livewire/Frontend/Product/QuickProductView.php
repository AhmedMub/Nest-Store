<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;

class QuickProductView extends Component
{
    public $product;
    public $langAr;

    public function mount($product, $langAr)
    {
        $this->product = Product::findOrFail($product);
        $this->langAr = $langAr;
    }

    public function render()
    {
        return view('livewire.frontend.product.quick-product-view');
    }
}
