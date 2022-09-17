<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Confirm extends Component
{
    use WithPagination;
    //Sorting
    public $sortBy = 'id';
    public $sortDirection = 'desc';
    public $field = 'id';
    public $perPage = 5;
    public $search = '';

    // 1 is orders confirmed
    public $orderType = 1;
    public $type;


    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'processOrder' => 'passedOrder',
        'deletedProcessed' => 'delete',
    ];

    //Bulk Delete
    //this is an empty array property will be bind to all checkboxes it will grab all selected values ids
    public $selectedCheckboxes = [];

    //select all method below
    public $selectAll = false;

    public $bulkDisabled = true;

    public function sortBy($field)
    {
        if ($this->sortDirection == 'desc') {

            $this->sortDirection = 'asc';
        } else {

            $this->sortDirection = 'desc';
        }
        return $this->sortBy = $field;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    //bulk delete: this is will be bind with delete button (wire:click.prevent='deleteSelected'), it will grab all ids from selectedCheckboxes array and will deleted, then return empty array as it was, then make sure that selectAll false
    public function selectedOrders()
    {
        if (count($this->selectedCheckboxes) > 0) {
            foreach ($this->selectedCheckboxes as $model) {
                Order::findOrFail($model)->update(['status' => 2]);
            }
        }
        $this->selectedCheckboxes = [];
        $this->selectAll = false;

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'selected orders are processing'
        ]);

        //if no pending orders left admin will be directed to confirmed orders
        if (Order::whereStatus($this->orderType)->count() == 0) {
            redirect()->route('orders.processing');
        }
    }

    //catch select all property from checkbox input: this will be model bind ( wire:model='selectAll') for checkbox input type, so if user checked 'select All' all checkboxes will be selected accordingly
    public function updatedSelectAll($val)
    {
        if ($val) {
            $this->selectedCheckboxes = Order::pluck('id');
        } else {
            $this->selectedCheckboxes = [];
        }
    }

    public function confirm($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => 'Are you sure want to process this order?',
            'text' => 'This action will process the selected order so it will be removed from confirmed orders',
            'id' => $id,
        ]);
    }
    public function passedOrder($id)
    {
        $updateStatus = Order::findOrFail($id)->update(['status' => 2]);

        if ($updateStatus) {
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'title' => 'Order has passed to processing orders successfully!',
                'text' => 'Find the order in processing orders list',
            ]);
        }
        //if no pending orders left admin will be directed to confirmed orders
        if (Order::whereStatus($this->orderType)->count() == 0) {
            redirect()->route('orders.processing');
        }
    }
    public function deleteItem($id)
    {
        $this->dispatchBrowserEvent('swal:confirmDelete', [
            'type' => 'warning',
            'title' => 'Are you sure want to delete this order?',
            'text' => 'You won\'t be able to revert this!',
            'id' => $id,
        ]);
    }
    public function delete($id)
    {
        $getOrder = Order::findOrFail($id);
        //increase the qty that has been deducted from order once its crated
        foreach ($getOrder->orderItems as $order) {
            $product = Product::findOrFail($order->orderProduct->id);
            $product->update([
                'qty' => $product->qty + $order->qty
            ]);
        }

        $getOrder->update(['status' => 5]);

        if ($getOrder) {
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'title' => 'Order deleted successfully!',
                'text' => 'Find the order in deleted orders list',
            ]);
        }
        //if no pending orders left admin will be directed to canceled orders
        if (Order::whereStatus($this->orderType)->count() == 0) {
            redirect()->route('orders.canceled');
        }
    }


    public function render()
    {
        $this->bulkDisabled = count($this->selectedCheckboxes) < 1;

        $orders = Order::whereStatus($this->orderType)->search($this->search)->orderBy($this->sortBy, $this->sortDirection)->paginate($this->perPage);

        return view('livewire.admin.orders.confirm', compact('orders'));
    }
}
