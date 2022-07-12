<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;

class HotDeals extends Component
{
    public Product $product;
    public string $name;
    public bool $hot_deals;

    public function mount()
    {

        $this->hot_deals = $this->product->getAttribute('hot_deals');
    }

    public function updating($name, $value)
    {
        $this->product->setAttribute($name, $value)->save();

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'Status Updated Successfully'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.product.hot-deals');
    }
}
