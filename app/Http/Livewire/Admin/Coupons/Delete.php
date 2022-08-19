<?php

namespace App\Http\Livewire\Admin\Coupons;

use App\Models\Coupon;
use Livewire\Component;

class Delete extends Component
{
    public $coupon;

    protected $listeners = ['deleteSlider'];

    public function deleteSlider($id)
    {
        $this->coupon = $id;
    }

    public function delete()
    {
        Coupon::findOrFail($this->coupon)->delete();

        $this->emit('couponDeleted');

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'Coupon Deleted Successfully'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.coupons.delete');
    }
}
