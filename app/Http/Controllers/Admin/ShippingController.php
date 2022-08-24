<?php

namespace App\Http\Controllers\Admin;

use App\Models\ShippingCountry;
use App\Models\ShippingDistrict;
use Illuminate\Routing\Controller;

class ShippingController extends Controller
{

    public function countryShipping()
    {
        $count = ShippingCountry::count();
        return view('admin.pages.country-shipping', compact('count'));
    }

    public function districtShipping()
    {
        $count = ShippingDistrict::count();
        return view('admin.pages.district-shipping', compact('count'));
    }
}
