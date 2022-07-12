<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;

class AddInfoStatus extends Component
{
    public Product $product;
    public string $name;
    public bool $additionalInfo_status;

    public function mount()
    {

        $this->additionalInfo_status = $this->product->getAttribute('additionalInfo_status');
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
        return view('livewire.admin.product.add-info-status');
    }
}
