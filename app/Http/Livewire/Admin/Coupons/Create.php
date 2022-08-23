<?php

namespace App\Http\Livewire\Admin\Coupons;

use App\Models\Coupon;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $discount;
    public $validity;
    public $carbonDate;

    protected $rules = [
        'name' => ['required', 'string', 'unique:coupons'],
        'discount' => ['required', 'integer'],
        'validity' => ['required', 'string',],
    ];

    public function mount($carbonDate)
    {
        $this->carbonDate = $carbonDate;
    }

    public function create()
    {
        $this->validate();

        $validFrom = explode(" ", $this->validity)[0];
        $validTo = explode(" ", $this->validity)[2];

        $count = Coupon::count();

        //refresh page
        if ($count <= 1) {
            redirect()->route('coupon');
        }

        Coupon::create([
            'name' => $this->name,
            'discount' => $this->discount,
            'valid_from' => $validFrom,
            'valid_to' => $validTo,
        ]);

        $this->reset();
        $this->emit('newCouponAdded');

        //to clear flatpicker dates
        $this->dispatchBrowserEvent('clearDates');

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'New Coupon Added Successfully'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.coupons.create');
    }
}