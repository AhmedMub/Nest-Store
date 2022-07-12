<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;

class ReviewStatus extends Component
{
    public Product $product;
    public string $name;
    public bool $reviews_status;

    public function mount()
    {

        $this->reviews_status = $this->product->getAttribute('reviews_status');
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
        return view('livewire.admin.product.review-status');
    }
}
