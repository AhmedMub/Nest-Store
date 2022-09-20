<?php

namespace App\Http\Controllers\Frontend;

use App\Events\ZeroProductQuantity;
use App\Http\Controllers\Controller;
use App\Mail\SendOrderInvoice;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ShippingCountry;
use App\Models\ShippingDistrict;
use App\Models\User;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class PaymentsController extends Controller
{
    public function checkoutPage()
    {
        //get cart items
        $cartContent = Cart::content();
        //user data
        $user = Auth::user();

        return view('frontend.pages.checkout', compact('cartContent', 'user'));
    }

    public function placeOrder(Request $request)
    {
        //validate incoming request
        $validated = $request->validate([
            'address' => ['required', 'string', 'regex:/^[^<>()*?=%_${}#:;@![\]{}\/]+$/i', 'between:1,50'],
            'addressTwo' => ['nullable', 'string', 'regex:/^[^<>()*?=%_${}#:;@![\]{}\/]+$/i'],
            'selectCountry' => ['required', 'integer'],
            'selectDistrict' => ['required', 'integer'],
            'postalCode' => ['required', 'integer'],
            'phone' => ['required', "integer"],
            'additional_information' => ['nullable', 'string', 'regex:/^[^<>()*?=%_${}#:;@![\]{}\/]+$/i'],
            'payment_option' => ['required', 'string', "regex:/^[a-z]+$/i"]
        ]);

        //save data into user
        $updateUser = User::findOrFail(Auth::user()->id)->update([
            'address' => $validated['address'],
            'addressTwo' => $validated['addressTwo'],
            'phone' => $validated['phone'],
            'district' => ShippingCountry::findOrFail($validated['selectCountry'])->country,
            'area' => ShippingDistrict::findOrFail($validated['selectDistrict'])->district,
            'postalCode' => $validated['postalCode'],
        ]);

        if (!$updateUser) {
            return null;
        }

        //check the payment choice
        if ($request->payment_option == 'cash') {
            return $this->cashPayment($validated);
        } else {
            return $this->onlinePayment($validated);
        }
    }

    public function cashPayment($request = [])
    {
        $user = Auth::user();
        $discountedTotal = null;
        $couponPercent = null;
        $shippingFees = 0.1;
        $totalAmount = Cart::total();
        $paymentOption;
        if ($request['payment_option'] == 'cash') {
            $paymentOption = 0;
        } else {
            $paymentOption = 1;
        }
        //district
        $district = ShippingDistrict::findOrFail($request['selectDistrict'])->district;
        //country;
        $country = ShippingCountry::findOrFail($request['selectCountry'])->country;

        if (Session::has('coupon')) {
            $discountedTotal = Session::get('coupon')['amountDiscounted'];
            $couponPercent = Session::get('coupon')['couponDiscount'];
        }

        //new order
        $newOrder = Order::create([
            'user_id' => $user->id,
            'status' => 0,
            'address' => $request['address'],
            'addressTwo' => $request['addressTwo'],
            'district' => $country,
            'area' => $district,
            'fname' => $user->first_name,
            'lname' => $user->second_name,
            'email' => $user->email,
            'postal_code' => $request['postalCode'],
            'payment_method' => $paymentOption,
            'amount' => $totalAmount,
            'subtotal' => Cart::subtotal(),
            'shipping_fees' => Cart::subtotal() * $shippingFees,
            'additional_info' => $request['additional_information'],
            'invoice_no' => $this->generateInvoiceNo(),
            'currency' => 'usd',
            'shipping_date' => Carbon::now()->addDays(2)->format('Y-m-d'),
            'discounted_coupon' => $discountedTotal,
            'phone' => $request['phone'],
            'coupon_discount_percentage' => $couponPercent
        ]);

        if ($newOrder) {
            // create Order Items
            $this->createOrderItems($newOrder->id);
            return view('frontend.pages.order-success', ['invoice' => $newOrder->invoice_no]);
        } else {
            return view('frontend.pages.order-failed', ['invoice' => $newOrder->invoice_no]);
        }
    }

    public function onlinePayment($request = [])
    {
        return view('frontend.pages.order-failed', ['invoice' => 'failed']);
    }

    public function createOrderItems($orderId)
    {
        $cartItems = Cart::content();

        foreach ($cartItems as $item) {
            if (!empty($item->options['basePrice'])) {
                $discountedPrice = $item->options['basePrice'];
            } else {
                $discountedPrice = null;
            }
            OrderItem::create([
                'order_id' => $orderId,
                'product_id' => $item->id,
                'price' => $item->price,
                'qty' => $item->qty,
                'discounted_price' => $discountedPrice
            ]);

            //find product
            $prQty = Product::findOrFail($item->id);

            //decrease product qty
            $prQty->update(['qty' => $prQty->qty - $item->qty]);

            if ($prQty->qty == 0) {

                //this will fire an event for a listener to disable the product status
                event(new ZeroProductQuantity($prQty->id));
            }
        }
        //send email to user
        $this->sendInvoiceEmail($orderId);

        //clear session and cart after the checkout
        $this->clearSessionAndCart();
    }

    //to generate an invoice number
    public function generateInvoiceNo()
    {
        //check if there is no orders invoice start from below number
        if (Order::count() == 0) {
            return date('Y') . '-0001';
        }

        //get last record
        $record;
        $expNum;
        if (Order::latest()->first() !== null) {
            $record = Order::latest()->first()->invoice_no;
            $expNum = explode('-', $record);
        }

        //check first day in a year
        if (date('z') === '0') {
            $nextInvoiceNumber = date('Y') . '-0001';
        } else {
            //increase 1 with last invoice number and maintain the format
            $nextInvoiceNumber = $expNum[0] . '-' . str_pad($expNum[1] + 1, 4, '0', STR_PAD_LEFT);
        }

        return $nextInvoiceNumber;
    }

    //generate order invoice
    public function userOrderInvoice($invoice)
    {
        $order = Order::where('invoice_no', $invoice)->firstOrFail();

        return view('frontend.pages.order-invoice', compact('order'));
    }

    public function sendInvoiceEmail($id)
    {
        $order = Order::findOrFail($id);
        $user = Auth::user();

        Mail::to("$user->email")->send(new SendOrderInvoice($order));
    }

    public function clearSessionAndCart()
    {
        if (Session::has('coupon') || Cart::count() > 0) {
            Cart::destroy();
            Session::forget('coupon');
        }
    }
}
