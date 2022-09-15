<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class CancelRequests extends Component
{
    use WithPagination;
    //Sorting
    public $sortBy = 'id';
    public $sortDirection = 'desc';
    public $field = 'id';
    public $perPage = 5;
    public $search = '';

    // 1 is orders cancel request
    public $orderType = 1;


    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'cancelConfirmedOrders' => 'delete',
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
                $getOrder = Order::findOrFail($model);
                foreach ($getOrder->orderItems as $order) {
                    $product = Product::findOrFail($order->orderProduct->id);
                    $product->update([
                        'qty' => $product->qty + $order->qty
                    ]);
                }
                $getOrder->update(['status' => 5]);
            }
        }
        $this->selectedCheckboxes = [];
        $this->selectAll = false;

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'selected orders are canceled successfully!'
        ]);

        //if no pending orders left admin will be directed to confirmed orders
        if (Order::whereCancelRequest($this->orderType)->where('status', '!=', 5)->count() == 0) {
            redirect()->route('orders.canceled');
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
        //redirect to cancel whenever not orders requests
        if (Order::whereCancelRequest($this->orderType)->where('status', '!=', 5)->count() == 0) {
            redirect()->route('orders.canceled');
        }
    }


    public function render()
    {
        $this->bulkDisabled = count($this->selectedCheckboxes) < 1;

        $orders = Order::whereCancelRequest($this->orderType)->where('status', '!=', 5)->search($this->search)->orderBy($this->sortBy, $this->sortDirection)->paginate($this->perPage);

        return view('livewire.admin.orders.cancel-requests', compact('orders'));
    }
}
