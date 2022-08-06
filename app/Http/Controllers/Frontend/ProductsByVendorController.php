<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Tags\Tag;

class ProductsByVendorController extends Controller
{
    public function getProducts($slug)
    {
        $vendor = Vendor::whereSlug($slug)->firstOrFail();
        //if vendor disabled by admin will be redirected to home
        if ($vendor->status == 0) {
            return redirect()->route('home');
        }

        /*
        /-get related products to selected vendor
        //*this is only to check if there is a products or not to display.
        /-the products will be displayed through livewire component to use livewire pagination, this $products will not be passed to livewire component
        */
        $products = $vendor->productVendor->where('product_status', 1);

        $tags = Tag::whereStatus(1)->take(5)->get();
        $user = 0;
        if (Auth::check()) {
            $user = Auth::user()->id;
        }

        return view('frontend.pages.show-products', compact('vendor', 'tags', 'products', 'user'));
    }
}
