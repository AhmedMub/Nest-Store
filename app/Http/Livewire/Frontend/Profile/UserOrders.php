<?php

namespace App\Http\Livewire\Frontend\Profile;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserOrders extends Component
{
    public $orders;

    protected $listeners = [
        'refresh' => '$refresh'
    ];

    public function render()
    {
        $this->orders = Order::whereUserId(Auth::user()->id)->where('status', '!=', 5)->latest()->get();

        return view('livewire.frontend.profile.user-orders', [
            'orders' => $this->orders
        ]);
    }
}
