<?php

namespace App\Http\Livewire\Admin\Coupons;

use App\Models\Coupon;
use Livewire\Component;

class Status extends Component
{
    public Coupon $coupon;
    public string $name;
    public bool $status;

    public function mount()
    {

        $this->status = $this->coupon->getAttribute('status');
    }

    public function updating($name, $value)
    {
        $this->coupon->setAttribute($name, $value)->save();

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'Coupon Status Updated Successfully'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.coupons.status');
    }
}
