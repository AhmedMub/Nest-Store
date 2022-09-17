<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function notificationsList()
    {
        // any notifications will be added to the collection
        $notifications = new Collection();

        $orders = Order::whereCancelRequest(1)->where('status', '!=', 5)->latest()->get();

        //add orders requests to the beginning of the collection
        $notifications->prepend([$orders]);

        return view('admin.pages.notifications', compact('notifications'));
    }
}
