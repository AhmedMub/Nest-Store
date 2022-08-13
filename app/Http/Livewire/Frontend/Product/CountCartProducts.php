<?php

namespace App\Http\Livewire\Frontend\Product;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CountCartProducts extends Component
{
    public $products;
    public $count;

    protected $listeners = ['refreshCart' => '$refresh'];

    public function removeItem($id)
    {
        //FIXME error
        $rowId = $id;

        Cart::remove($rowId);

        $this->emit('refreshCart');
    }

    public function render()
    {
        //check if the cart as products
        if (count(Cart::content()) > 0) {
            $this->products = Cart::content();
            $this->count = Cart::content()->count();
        }
        return view('livewire.frontend.product.count-cart-products', [
            'products' => $this->products,
            'count' => $this->count
        ]);
    }
}
