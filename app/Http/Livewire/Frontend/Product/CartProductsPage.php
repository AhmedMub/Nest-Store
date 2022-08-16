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
    public $count = 1;
    public array $qty = [];
    public $cartContent;
    public $subtotal;

    protected $listeners = ['refreshCart' => '$refresh'];

    public function mount()
    {
        //FIXME need to fixed
        $this->subtotal = Cart::subtotal();
    }

    public function minus($rowId, $productId, $prQty)
    {
        //update product quantity
        $prQty--;

        //change quantity
        $this->qty[$productId] = $prQty;

        //update cart with new quantity
        Cart::update($rowId, $this->qty[$productId]);


        //refresh header cart counter
        $this->emitTo('frontend.product.count-cart-products', 'refreshCart');
    }

    public function plus($rowId, $productId, $prQty)
    {

        //update product quantity
        $prQty++;

        //change quantity
        $this->qty[$productId] = $prQty;

        //update cart with new quantity
        //TODO this codes should not be repetted make them inside funciton with params
        Cart::update($rowId, $this->qty[$productId]);

        //refresh header cart counter
        $this->emitTo('frontend.product.count-cart-products', 'refreshCart');
    }

    public function clearCart()
    {
        $content = Cart::content();
        if (count($content) > 0) {
            Cart::destroy();
        }
        redirect()->route('shop');
    }

    public function removeItem($id)
    {
        Cart::remove($id);

        //to update the count for cart in header
        $this->emitTo('frontend.product.count-cart-products', 'refreshCart');
    }

    public function dehydrate()
    {
        //FIXME
        $this->subtotal = Cart::subtotal();
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
