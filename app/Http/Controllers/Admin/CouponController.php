<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function manageCoupons()
    {
        $count = Coupon::count();

        $carbonDate = Carbon::yesterday()->toDateString();
        return view('admin.pages.manage-coupons', compact('count', 'carbonDate'));
    }
}
