<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfile extends Controller
{

    public function show()
    {
        //display orders for users
        $orders = Order::whereUserId(Auth::user()->id)->where('status', '!=', 5)->latest()->get();

        return view('frontend.pages.profile', compact('orders'));
    }

    // products wishlist page:
    public function wishList()
    {
        $user = Auth::user();

        //many to many relation
        $products = $user->addToWishes()->whereProductStatus(1)->latest()->get();

        //check route AR
        $langAr = str_contains(url()->current(), '/ar');

        return view('frontend.pages.user-wishlist', compact('user', 'products', 'langAr'));
    }

    // products compare page:
    public function productsCompare()
    {
        //
    }
}
