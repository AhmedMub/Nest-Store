<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Order;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class ShowOrderItems extends Component
{
    public $status, $address, $addressTwo, $district, $area, $fname, $lname, $email, $postal_code, $payment_method, $amount, $additional_info, $transaction_id, $invoice_no, $currency, $shipping_dated, $delivered_date, $canceled_date, $canceled_reason, $discounted_coupon, $phone, $coupon_discount_percentage, $shipping_fees, $subtotal, $cancel_request;

    public $items = [];
    public $currentRoute;
    public $orderReason = "";

    protected $listeners = ['showOrderItems' => 'showItems'];

    public function mount()
    {
        // so i can use in the showItems()
        $this->currentRoute = Route::currentRouteName();
    }

    public function showItems($id)
    {
        $order = Order::findOrFail($id);
        $this->status = $order->status;
        $this->address = $order->address;
        $this->addressTwo = $order->addressTwo;
        $this->district = $order->district;
        $this->area = $order->area;
        $this->fname = $order->fname;
        $this->lname = $order->lname;
        $this->email = $order->email;
        $this->phone = $order->phone;
        $this->postal_code = $order->postal_code;
        $this->additional_info = $order->additional_info;
        if ($this->currentRoute == "orders.canceled.requests") {
            $this->orderReason = $order->canceled_reason;
        }
        //....
        $this->payment_method = $order->payment_method;
        $this->amount = $order->amount;
        $this->transaction_id = $order->transaction_id;
        $this->invoice_no = $order->invoice_no;
        $this->currency = $order->currency;
        //$this->shipping_dated = $order->shipping_dated;
        //$this->delivered_date = $order->delivered_date;
        //$this->canceled_date = $order->canceled_date;
        //$this->canceled_reason = $order->canceled_reason;
        $this->discounted_coupon = $order->discounted_coupon;

        $this->coupon_discount_percentage = $order->coupon_discount_percentage;
        $this->shipping_fees = $order->shipping_fees;
        $this->subtotal = $order->subtotal;
        //$this->cancel_request = $order->cancel_request;

        $this->items = $order->orderItems;
    }

    public function render()
    {
        return view('livewire.admin.orders.show-order-items');
    }
}
