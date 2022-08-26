<?php

namespace App\Http\Livewire\Frontend\Product;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CheckoutOrderSummary extends Component
{
    public $couponDiscount;
    public $discountPercentage;
    public $subtotal;
    public $shippingFees;
    public $fees = 0.1;
    public $total;
    public $oldTotal;

    protected $listeners = ['couponDiscount' => 'applyCoupon'];

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



    public function applyCoupon($discount)
    {
        $this->discountPercentage = $discount;

        //to fix error: A non-numeric value encountered
        $this->couponDiscount = str_replace(',', '', number_format($this->subtotal * ($discount / 100), 2));
        //old total
        $this->oldTotal = str_replace(',', '', number_format($this->subtotal + $this->shippingFees, 2));
        //apply the coupon discount
        $this->total = str_replace(',', '', number_format($this->oldTotal - $this->couponDiscount, 2));

        /*
            /** saving data into session
             coupon reference
            coupon = [
                0 => shipping fees,
                1 => coupon discount percentage
                2 => mount of coupon discount will be applied
                3 => total price after coupon has been discounted
                4 => total price without discount
            ]
        */
        Session::put('coupon', [
            'shippingFees' => $this->fees,
            'couponDiscount' => $discount,
            'amountDiscounted' => $this->couponDiscount,
            'totalDiscounted' => $this->total,
            'totalWithoutDiscount' => $this->oldTotal
        ]);
    }

    public function render()
    {
        return view('livewire.frontend.product.checkout-order-summary');
    }
}
