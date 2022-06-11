<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;

class Delete extends Component
{
    public $product_id;

    protected $listeners = ['deleteProduct'];

    public function deleteProduct($id)
    {
        $this->product_id = $id;
    }

    public function delete()
    {

        Product::findOrFail($this->product_id)->delete();

        $this->emit('productDeleted');

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'Product Deleted Successfully'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.product.delete');
    }
}
