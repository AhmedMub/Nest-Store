<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ApplyCoupon extends Component
{
    public $coupon;
    public $disabled = true;

    protected $rules = [
        'coupon' => ['required', 'string', 'max:7'],
    ];

    public function checkCoupon()
    {
        //disable coupon
        if (!$this->disabled) {
            return null;
        }
        $this->validate();

        $findCoupon = Coupon::whereName($this->coupon)->firstOrFail();
        //check coupon status
        if (!isset($findCoupon) || $findCoupon->status != 1) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => 'Entered Coupon is Invalid'
            ]);
            return null;
        }
        ///check valid days
        $validDays = $findCoupon->validityDays($findCoupon->valid_from, $findCoupon->valid_to);
        if ($validDays <= 0) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'warning',
                'message' => 'Entered Coupon is Expired'
            ]);
            return null;
        }

        //send coupon discount to checkout component
        $this->emitTo('frontend.product.checkout-order-summary', 'couponDiscount', $findCoupon->discount);

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Coupon Apply Successfully'
        ]);
        $this->disabled = false;
    }
    public function render()
    {
        return view('livewire.frontend.product.apply-coupon');
    }
}
