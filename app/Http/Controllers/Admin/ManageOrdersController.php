<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
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
        $orderType = 1;
        $countOrders = Order::whereCancelRequest($orderType)->where('status', '!=', 5)->count();

        return view('admin.pages.manage-orders', compact('countOrders'));
    }

    public function showInvoice($id)
    {
        $order = Order::where('invoice_no', $id)->firstOrFail();

        return view('frontend.pages.order-invoice', compact('order'));
    }
}
