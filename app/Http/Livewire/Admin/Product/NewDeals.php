<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;

class NewDeals extends Component
{
    public Product $product;
    public string $name;
    public bool $product_status;

    public function mount()
    {

        $this->new_deals = $this->product->getAttribute('new_deals');
    }

    public function updating($name, $value)
    {
        $this->product->setAttribute($name, $value)->save();
    }
    public function render()
    {
        return view('livewire.admin.product.new-deals');
    }
}
