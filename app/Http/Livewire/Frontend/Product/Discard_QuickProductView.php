<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;

class QuickProductView extends Component
{
    public $langAr;
    public $product;
    protected $listeners = ['quickShow'];

    public function mount($langAr)
    {
        $this->langAr = $langAr;
    }

    public function quickShow($id)
    {

        //$this->product = Product::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.frontend.product.quick-product-view');
    }
}
