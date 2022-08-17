<?php

namespace App\Http\Livewire\Frontend\Product;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
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
    public $shippingFees;
    public $fees = 0.10;
    public $total;



    protected $listeners = ['refreshCart' => '$refresh'];

    public function mount()
    {
        $this->subtotal = Cart::subtotal();
        //shipping fees
        $this->shippingFees = number_format($this->subtotal * $this->fees, 2);

        //total items in cart
        $this->total = number_format(Cart::subtotal() + $this->shippingFees, 2);
    }

    public function minus($rowId, $productId, $prQty)
    {
        //update product quantity
        $prQty--;

        //change quantity
        $this->qty[$productId] = $prQty;

        $this->updateCart($rowId, $productId);
    }

    public function plus($rowId, $productId, $prQty)
    {

        //update product quantity
        $prQty++;

        //change quantity
        $this->qty[$productId] = $prQty;


        $this->updateCart($rowId, $productId);
    }

    public function updateCart($rowId, $productId)
    {
        //update cart with new quantity
        Cart::update($rowId, $this->qty[$productId]);

        //update subtotal
        $this->toUpdateTotals();

        //refresh header cart counter
        $this->emitTo('frontend.product.count-cart-products', 'refreshCart');
    }

    public function removeItem($id)
    {
        Cart::remove($id);

        //update subtotal
        $this->toUpdateTotals();

        //to update the count for cart in header
        $this->emitTo('frontend.product.count-cart-products', 'refreshCart');
    }

    //update totals function
    public function toUpdateTotals()
    {
        $this->subtotal = Cart::subtotal();

        $this->shippingFees = number_format($this->subtotal * $this->fees, 2);

        //total items in cart
        $this->total = number_format(Cart::subtotal() + $this->shippingFees, 2);
    }

    public function clearCart()
    {
        $content = Cart::content();
        if (count($content) > 0) {
            Cart::destroy();
        }
        redirect()->route('shop');
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
