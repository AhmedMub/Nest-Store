<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;

class DiscountStatus extends Component
{
    public Product $product;
    public string $name;
    public bool $discount_status;

    public function mount()
    {

        $this->discount_status = $this->product->getAttribute('discount_status');
    }

    public function updating($name, $value)
    {
        $this->product->setAttribute($name, $value)->save();
    }
    public function render()
    {
        return view('livewire.admin.product.discount-status');
    }
}
