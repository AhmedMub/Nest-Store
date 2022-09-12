<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ManageOrdersController extends Controller
{
    public function pendingOrders()
    {
        $countOrders = Order::whereStatus(0)->count();

        return view('admin.pages.manage-orders', compact('countOrders'));
    }
    public function confirmedOrders()
    {
        $countOrders = Order::whereStatus(1)->count();

        return view('admin.pages.manage-orders', compact('countOrders'));
    }
    public function processingOrders()
    {
    }
    public function shippedOrders()
    {
    }
    public function deliveredOrders()
    {
    }
    public function canceledOrders()
    {
    }
    public function canceledOrdersRequests()
    {
    }
}
