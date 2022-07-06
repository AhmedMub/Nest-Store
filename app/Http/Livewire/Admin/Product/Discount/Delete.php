<?php

namespace App\Http\Livewire\Admin\Product\Discount;

use App\Models\ProductDiscount;
use Livewire\Component;

class Delete extends Component
{
    public $discountId;

    protected $listeners = ['deleteDiscount'];

    public function deleteDiscount($id)
    {
        $this->discountId = $id;
    }

    public function delete()
    {
        ProductDiscount::findOrFail($this->discountId)->delete();

        $this->emit('discountDeleted');

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'Discount Deleted Successfully'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.product.discount.delete');
    }
}
