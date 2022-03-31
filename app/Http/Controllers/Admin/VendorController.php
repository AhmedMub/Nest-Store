<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vendor;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function show()
    {
        $count = Vendor::count();
        return view('admin.pages.vendors', compact('count'));
    }
}
