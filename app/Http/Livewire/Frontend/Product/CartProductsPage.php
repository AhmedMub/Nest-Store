<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CartProductsPage extends Component
{
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
        //to fix error: A non-numeric value encountered
        if (str_contains(Cart::subtotal(), ',')) {
            $this->subtotal = str_replace(',', '', Cart::subtotal());
        } else {
            $this->subtotal = Cart::subtotal();
        }
        //shipping fees
        $this->shippingFees = number_format($this->subtotal * $this->fees, 2);
        //total items in cart
        $this->total = number_format($this->subtotal + $this->shippingFees, 2);
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
        $productQty = Product::findOrFail($productId)->qty;

        //update product quantity
        if ($prQty == $productQty) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'warning',
                'message' => 'Product quantity not available'
            ]);
            return null;
        } else {
            $prQty++;
        }

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

        $this->forgetSession();
    }

    public function removeItem($id)
    {
        Cart::remove($id);

        //update subtotal
        $this->toUpdateTotals();

        //to update the count for cart in header
        $this->emitTo('frontend.product.count-cart-products', 'refreshCart');

        $this->forgetSession();
    }

    //update totals function
    public function toUpdateTotals()
    {
        //to fix error: A non-numeric value encountered
        if (str_contains(Cart::subtotal(), ',')) {
            $this->subtotal = str_replace(',', '', Cart::subtotal());
        } else {
            $this->subtotal = Cart::subtotal();
        }
        $this->shippingFees = number_format($this->subtotal * $this->fees, 2);

        //total items in cart
        $this->total = number_format($this->subtotal  + $this->shippingFees, 2);
    }

    public function clearCart()
    {
        $content = Cart::content();
        if (count($content) > 0) {
            Cart::destroy();
        }
        $this->forgetSession();
        redirect()->route('shop');
    }

    public function forgetSession()
    {
        //if any of the cart items changed session will be removed
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
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
