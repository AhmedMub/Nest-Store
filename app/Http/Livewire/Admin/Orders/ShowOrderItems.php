<?php

namespace App\Http\Livewire\Admin\Orders;

use Livewire\Component;

class ShowOrderItems extends Component
{
    protected $listeners = ['showOrderItems' => 'showItems'];

    public function showItems($id)
    {
    }

    public function render()
    {
        return view('livewire.admin.orders.show-order-items');
    }
}
