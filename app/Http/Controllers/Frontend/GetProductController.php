<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetProductController extends Controller
{

    public function show($slug)
    {

        $product = Product::whereSlug($slug)->where('product_status', 1)->firstOrFail();

        $user = 0;
        if (Auth::check()) {
            $user = Auth::user()->id;
        }

        return view('frontend.pages.show-single-product', compact('product', 'user'));
    }
}
