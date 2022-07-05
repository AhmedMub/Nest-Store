<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\ProductTag;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function show()
    {
        $count = Product::count();
        return view('admin.pages.products', compact('count'));
    }

    public function productTags()
    {
        $count = ProductTag::count();
        return view('admin.pages.product-tags', compact('count'));
    }
}
