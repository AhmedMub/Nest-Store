<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AreaShipping;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Spatie\Tags\Tag;

class FrontController extends Controller
{

    public function index()
    {
        //get first records where are 10 records
        $catsFirstRecords = Category::select('*')->whereStatus(1)->where('featured_category', 0)->take(10)->get();

        $count = Category::count();

        //skip the records you got "$catsFirstRecords"
        $skip = 10;

        //number remaining categories
        $remaining = $count - $skip;

        //get remaining categories
        $catsRemainingRecords = Category::whereStatus(1)->where('featured_category', 0)->skip($skip)->take($remaining)->get();

        //Slider
        $sliders = Slider::whereStatus(1)->latest()->get();

        //get Featured Categories
        $featuredCats = Category::whereStatus(1)->where('featured_category', 1)->latest()->get();

        //get 6 categories for popular products section
        $getSixCats = Category::select('*')->whereStatus(1)->where('featured_category', 0)->take(6)->get();

        //get auth user
        $user = 0;
        if (Auth::check()) {
            $user = Auth::user()->id;
        }

        $getFiveProducts = Product::where('product_status', 1)->take(5)->get();

        //get trending tags
        $trendingTags = Tag::whereStatus(1)->where('status_trending_sec', 1)->take(4)->get();


        return view('frontend.pages.index', compact(
            'catsFirstRecords',
            'catsRemainingRecords',
            'sliders',
            'featuredCats',
            'getSixCats',
            'user',
            'getFiveProducts',
            'trendingTags'
        ));
    }

    public function shop()
    {
        //
    }

    public function aboutUs()
    {
        return view('frontend.pages.about');
    }

    public function contactUs()
    {
        return view('frontend.pages.contact');
    }

    public function cartPage()
    {
        //to check if cart has products
        $cartContent = Cart::content();

        return view('frontend.pages.cart', compact('cartContent'));
    }
    public function checkoutPage()
    {
        //get cart items
        $cartContent = Cart::content();
        $shippingAreas = AreaShipping::whereStatus(1)->pluck('id', 'country')->toArray();

        $collection = collect();

        $getTest = AreaShipping::whereCountry('United States')->get();


        $collection->push(AreaShipping::whereCountry('United States')->get())->all();

        // $tstss = [];
        // foreach ($collection->toArray()[0] as $tee) {
        //     $tstss[] = $tee['country'];
        // }
        // dd($tstss);


        return view('frontend.pages.checkout', compact('cartContent', 'shippingAreas'));
    }

    public function placeOrder(Request $request)
    {
        //
    }
}
