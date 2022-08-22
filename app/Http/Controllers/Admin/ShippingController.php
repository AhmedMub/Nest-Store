<?php

namespace App\Http\Controllers\Admin;

use App\Models\AreaShipping;
use Illuminate\Routing\Controller;

class ShippingController extends Controller
{

    public function areaShipping()
    {
        $count = AreaShipping::count();
        return view('admin.pages.shipping', compact('count'));
    }
}
