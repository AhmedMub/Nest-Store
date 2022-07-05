<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;

class VendorStatus extends Component
{
    public Product $product;
    public string $name;
    public bool $vendor_status;

    public function mount()
    {

        $this->vendor_status = $this->product->getAttribute('vendor_status');
    }

    public function updating($name, $value)
    {
        $this->product->setAttribute($name, $value)->save();
    }
    public function render()
    {
        return view('livewire.admin.product.vendor-status');
    }
}
