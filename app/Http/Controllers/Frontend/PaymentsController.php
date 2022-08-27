<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\ShippingCountry;
use App\Models\ShippingDistrict;
use App\Models\User;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

    //to generate an invoice number
    public function generateInvoiceNo()
    {
        //get last record
        $record;
        $expNum;
        if (Order::latest()->first() !== null) {
            $record = Order::latest()->first();
            $expNum = explode('-', $record->invoice_no);
        }

        //check first day in a year
        if (date('l', strtotime(date('Y-01-01')))) {
            $nextInvoiceNumber = date('Y') . '-0001';
        } else {
            //increase 1 with last invoice number
            $nextInvoiceNumber = $expNum[0] . '-' . $expNum[1] + 1;
        }

        return $nextInvoiceNumber;
    }

    public function placeOrder(Request $request)
    {
        //validate incoming request
        $validated = $request->validate([
            'address' => ['required', 'string', "regex:/^[a-zA-Z0-9\s&._-]+$/i", 'between:1,50'],
            'addressTwo' => ['nullable', 'string', "regex:/^[a-zA-Z0-9\s&._-]+$/i"],
            'selectCountry' => ['required', 'integer'],
            'selectDistrict' => ['required', 'integer'],
            'postalCode' => ['required', 'integer'],
            'phone' => ['required', "regex:/[0-9]{11}/"],
            'additional_information' => ['nullable', 'string', "regex:/^[a-zA-Z0-9\s&._-]+$/i"],
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

        $discountedTotal;
        $couponPercent;
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
            $discountedTotal = Session::get('coupon')['totalDiscounted'];
            $couponPercent = Session::get('coupon')['couponDiscount'];
        }

        //new order
        $newOrder = Order::create([
            'user_id' => Auth::user()->id,
            //NOTEstatus: 0: failed || 1: success
            'status' => $paymentOption,
            'address' => $request['address'],
            'addressTwo' => $request['addressTwo'],
            'district' => $country,
            'area' => $district,
            'fname' => Auth::user()->first_name,
            'lname' => Auth::user()->second_name,
            'email' => Auth::user()->email,
            'postal_code' => $request['postalCode'],
            'payment_method' => $paymentOption,
            'amount' => $totalAmount,
            'additional_info' => $request['additional_information'],
            'invoice_no' => $this->generateInvoiceNo(),
            'currency' => 'usd',
            'shipping_date' => Carbon::now()->addDays(2)->format('Y-m-d'),
            'discounted_coupon' => $discountedTotal,
            'phone' => Auth::user()->phone,
            'coupon_discount_percentage' => $couponPercent
        ]);

        // Order Items

        if ($newOrder) {
            return view('frontend.pages.order-success');
        } else {
            return view('frontend.pages.order-failed');
        }
    }

    public function onlinePayment($request = [])
    {
    }
}
