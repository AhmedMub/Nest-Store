<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CountCartProducts extends Component
{
    public $products;
    public $count;
    public $totalPrice;

    protected $listeners = ['refreshCart' => '$refresh'];

    public function removeItem($id)
    {
        if (isset($id)) {
            Cart::remove($id);
        }
    }

    public function render()
    {
        //check if the cart as products
        $this->products = Cart::content();
        $this->count = Cart::content()->count();
        $this->totalPrice = Cart::priceTotal();
        return view('livewire.frontend.product.count-cart-products', [
            'products' => $this->products,
            'count' => $this->count,
        ]);
    }
}
