<?php

namespace App\Http\Livewire\Frontend\Product;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartProductsPage extends Component
{
    /*
        number of cart products
        display cart product
        function for quantity and update subtotal
        function for remove single product  from cart
        fn to clear cart
        estimate for dissaply user address
        shipping fee 5% from the subtotal
    */

    public $products;
    public $user;
    public $count = 1;
    public $price;
    public array $qty = [];
    public $cartContent;
    public $existingProduct;



    public function removeItem($id)
    {
        Cart::remove($id);

        //to update the count for cart in header
        $this->emit('refreshCart');
    }

    public function render()
    {

        $this->products = Cart::content();
        $this->cartContent = $this->products->count();

        return view('livewire.frontend.product.cart-products-page', [
            'products' => $this->products
        ]);
    }
}
