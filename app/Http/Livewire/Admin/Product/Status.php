<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;

class Status extends Component
{
    public Product $product;
    public string $name;
    public bool $product_status;

    public function mount()
    {

        $this->product_status = $this->product->getAttribute('product_status');
    }

    public function updating($name, $value)
    {
        $this->product->setAttribute($name, $value)->save();
    }
    public function render()
    {
        return view('livewire.admin.product.status');
    }
}
