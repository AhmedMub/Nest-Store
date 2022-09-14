<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Pending extends Component
{
    use WithPagination;
    //Sorting
    public $sortBy = 'id';
    public $sortDirection = 'desc';
    public $field = 'id';
    public $perPage = 5;
    public $search = '';

    public $orderType = 0;
    public $type;


    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'confirmOrder',
        'deletedConfirmed' => 'delete'
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
                Order::findOrFail($model)->update(['status' => 1]);
            }
        }
        $this->selectedCheckboxes = [];
        $this->selectAll = false;

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'Orders has been confirmed'
        ]);
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
            'title' => 'Are you sure want to confirm this order?',
            'text' => 'This action will confirm the selected order so it will be removed from pending orders',
            'id' => $id,
        ]);
    }
    public function confirmOrder($id)
    {
        $updateStatus = Order::findOrFail($id)->update(['status' => 1]);

        if ($updateStatus) {
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'title' => 'Order confirmed successfully!',
                'text' => 'Find the order in confirmed orders list',
            ]);
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
    }


    public function render()
    {
        $this->bulkDisabled = count($this->selectedCheckboxes) < 1;

        $orders = Order::whereStatus($this->orderType)->search($this->search)->orderBy($this->sortBy, $this->sortDirection)->paginate($this->perPage);

        return view('livewire.admin.orders.pending', compact('orders'));
    }
}
