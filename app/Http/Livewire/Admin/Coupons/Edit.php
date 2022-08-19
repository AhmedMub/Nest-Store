<?php

namespace App\Http\Livewire\Admin\Coupons;

use App\Models\Coupon;
use Livewire\Component;

class Edit extends Component
{
    public $name;
    public $discount;
    public $validity;
    public $carbonDate;
    public $couponId;
    public $validFrom;
    public $validTo;

    protected $listeners = [
        'editCoupon',
    ];

    protected function rules()
    {
        return [
            'name' => ['required', 'string', "unique:coupons,name,$this->couponId"],
            'discount' => ['required', 'integer'],
            'validity' => ['nullable', 'string',],
        ];
    }


    public function mount($carbonDate)
    {
        $this->carbonDate = $carbonDate;
    }

    public function editCoupon($id)
    {
        $coupon = Coupon::findOrFail($id);
        $this->couponId = $id;
        $this->name = $coupon->name;
        $this->discount = $coupon->discount;
    }

    public function update()
    {
        $this->validate();

        Coupon::whereId($this->couponId)->update([
            'name' => $this->name,
            'discount' => $this->discount,
        ]);

        if ($this->validity) {
            $this->validFrom = explode(" ", $this->validity)[0];
            $this->validTo = explode(" ", $this->validity)[2];
            Coupon::whereId($this->couponId)->update([
                'valid_from' => $this->validFrom,
                'valid_to' => $this->validTo,
            ]);
        }

        $this->emit('couponUpdated');

        //to clear flatpicker dates
        $this->dispatchBrowserEvent('clearDates');

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Coupon Updated Successfully',
        ]);
    }
    public function render()
    {
        return view('livewire.admin.coupons.edit');
    }
}
