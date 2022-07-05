<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Product;
use Illuminate\Http\Request;

class Testing extends Controller
{

    public function testing()
    {

        $admin = Admin::find(1);
        $product = Product::find(18);

        dd($product->admin->email);
    }
}
