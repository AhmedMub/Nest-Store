<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Tags\Tag;

class ProductsByTagController extends Controller
{

    public function getProducts($id)
    {
        $byTag = Tag::findOrFail($id);
        $tagName = $byTag->name;

        /*
            code explanation refer to HomeController.php
        */
        $products = Product::withAnyTagsOfAnyType($tagName)->where('product_status', 1)->get();

        $tags = Tag::whereStatus(1)->take(5)->get();
        $user = 0;
        if (Auth::check()) {
            $user = Auth::user()->id;
        }
        return view('frontend.pages.show-products', compact('byTag', 'tags', 'products', 'user'));
    }
}
