<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\ProductDiscount;
use App\Models\ProductTag;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Spatie\Tags\Tag;

class ProductController extends Controller
{

    public function show()
    {
        $count = Product::count();
        return view('admin.pages.products', compact('count'));
    }

    public function productTags()
    {
        $count = Tag::count();
        return view('admin.pages.product-tags', compact('count'));
    }

    public function productDiscounts()
    {
        $count = ProductDiscount::count();
        return view('admin.pages.product-discount', compact('count'));
    }
}
