<?php

namespace App\Http\Livewire\Frontend\Profile;

use App\Models\Order;
use Livewire\Component;

class DeleteOrder extends Component
{
    public $order;
    public $reason;
    public $saveReason = null;

    protected $rules = [
        'reason' => ['required', 'string', "regex:/^[a-zA-Z0-9\s&._-]+$/i"]
    ];
    protected $messages = [
        'reason.required' => 'Please provide a brief reason for the cancellation'
    ];

    protected $listeners = [
        'delete' => 'sendDeleteRequest',
        'cancelMyOrder' => 'defineOrderId'
    ];

    public function defineOrderId($id)
    {
        $this->order = $id;
    }

    public function confirm($id)
    {

        $this->validate();

        $this->saveReason = $this->reason;
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => 'Are you sure?',
            'text' => 'You won\'t be able to revert this!',
            'id' => $id,
        ]);
        $this->dispatchBrowserEvent('hideModal');
    }

    public function sendDeleteRequest($id)
    {
        $getOrder = Order::findOrFail($id);
        $getOrder->update([
            'cancel_request' => 1,
            'canceled_reason' => $this->saveReason
        ]);

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Cancel request sent successfully!',
            'text' => 'You will be notified by email cancel when request get approved',
        ]);

        //after send the request return the def state
        $this->saveReason = null;
        $this->reset('reason');

        $this->emitTo('frontend.profile.user-orders', 'refresh');
        //NOTE this action admin must be notified and customer email of cancellations
    }


    public function render()
    {
        return view('livewire.frontend.profile.delete-order');
    }
}
