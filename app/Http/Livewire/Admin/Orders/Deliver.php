<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Deliver extends Component
{
    use WithPagination;
    //Sorting
    public $sortBy = 'id';
    public $sortDirection = 'desc';
    public $field = 'id';
    public $perPage = 5;
    public $search = '';

    // 4 is orders delivered
    public $orderType = 4;
    public $type;


    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'deletedDelivered' => 'delete',
    ];


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

        $orders = Order::whereStatus($this->orderType)->search($this->search)->orderBy($this->sortBy, $this->sortDirection)->paginate($this->perPage);

        return view('livewire.admin.orders.deliver', compact('orders'));
    }
}
