<?php

namespace App\Http\Controllers\Admin;

use App\Models\CountryShip;
use App\Models\DistrictShip;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ShippingController extends Controller
{

    public function countryShipping()
    {
        $count = CountryShip::count();
        return view('admin.pages.country-ship', compact('count'));
    }

    public function districtShipping()
    {
        $count = DistrictShip::count();
        return view('admin.pages.districts-ship', compact('count'));
    }
}
