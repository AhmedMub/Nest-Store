<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ManageOrdersController extends Controller
{
    public function pendingOrders()
    {
        $orderType = 0;
        $countOrders = Order::whereStatus($orderType)->count();

        return view('admin.pages.manage-orders', compact('countOrders'));
    }
    public function confirmedOrders()
    {
        $orderType = 1;
        $countOrders = Order::whereStatus($orderType)->count();

        return view('admin.pages.manage-orders', compact('countOrders'));
    }
    public function processingOrders()
    {
        $orderType = 2;
        $countOrders = Order::whereStatus($orderType)->count();

        return view('admin.pages.manage-orders', compact('countOrders'));
    }
    public function shippedOrders()
    {
        $orderType = 3;
        $countOrders = Order::whereStatus($orderType)->count();

        return view('admin.pages.manage-orders', compact('countOrders'));
    }
    public function deliveredOrders()
    {
        $orderType = 4;
        $countOrders = Order::whereStatus($orderType)->count();

        return view('admin.pages.manage-orders', compact('countOrders'));
    }
    public function canceledOrders()
    {
        $orderType = 5;
        $countOrders = Order::whereStatus($orderType)->count();

        return view('admin.pages.manage-orders', compact('countOrders'));
    }
    public function canceledOrdersRequests()
    {
        $orderType = 6;
        $countOrders = Order::whereCancelRequest(1)->count();

        return view('admin.pages.manage-orders', compact('countOrders'));
    }
}
