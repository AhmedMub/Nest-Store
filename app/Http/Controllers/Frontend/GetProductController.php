<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class GetProductController extends Controller
{

    public function show($slug)
    {
        $product = Product::whereSlug($slug)->where('product_status', 1)->firstOrFail();

        return view('frontend.pages.show-single-product', compact('product'));
    }
}
