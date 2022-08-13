<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetProductController extends Controller
{

    public function show($slug)
    {
        $product = Product::whereSlug($slug)->where('product_status', 1)->firstOrFail();

        $categories = Category::whereStatus(1)->where('featured_category', 0)->take(5)->get();

        $latestProducts = Product::where('product_status', 1)->take(3)->latest()->get();

        //get related product to selected product under same category
        $relatedCat = $product->productMainCat->id;
        $relatedProduct = Product::where('category_id', $relatedCat)->whereProductStatus(1)->take(4)->get();

        $user = 0;
        if (Auth::check()) {
            $user = Auth::user()->id;
        }

        return view('frontend.pages.show-single-product', compact(
            'product',
            'user',
            'categories',
            'latestProducts',
            'relatedProduct',
        ));
    }
}
