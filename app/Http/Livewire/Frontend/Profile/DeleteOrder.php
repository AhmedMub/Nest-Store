<?php

namespace App\Http\Livewire\Frontend\Profile;

use App\Models\Order;
use Livewire\Component;

class DeleteOrder extends Component
{
    public $order;

    protected $listeners = ['delete'];

    public function mount($order)
    {
        $this->order = $order;
    }

    public function confirm($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => 'Are you sure?',
            'text' => 'You won\'t be able to revert this!',
            'id' => $id,
        ]);
    }

    public function delete($id)
    {
        $getOrder = Order::findOrFail($id);

        $getOrder->update(['status' => 5]);

        $this->emitTo('frontend.profile.user-orders', 'deleted');

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Deleted!',
            'text' => 'Your order has been deleted.',
        ]);
        //NOTE this action admin must be notified and customer email of cancellations


    }


    public function render()
    {
        return view('livewire.frontend.profile.delete-order');
    }
}
