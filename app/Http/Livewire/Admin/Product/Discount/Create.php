<?php

namespace App\Http\Livewire\Admin\Product\Discount;

use App\Models\Product;
use App\Models\ProductDiscount;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $description;
    public $discount_percent;
    public $product_id;

    //TODO must add more validation with more messages and regex validation
    protected $rules = [
        'name' => ['required', 'string'],
        'description' => ['nullable', 'string'],
        'discount_percent' => ['required', 'integer'],
        'product_id' => ['required', 'integer'],
    ];

    protected $messages = [
        'name.required' => 'The Discount Name field is required',
        'discount_percent.required' => 'The Discount field is required',
        'product_id.required' => 'The Product field is required',
    ];

    public function create()
    {
        $count = ProductDiscount::count();

        $validate = $this->validate();

        ProductDiscount::create($validate);

        if ($count < 1) {

            redirect()->route('product.discount');
        }

        $this->emit('newDiscountAdded');

        $this->reset();

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Product Discount Added Successfully',
        ]);
    }
    public function render()
    {
        $products = Product::latest()->get();

        return view('livewire.admin.product.discount.create', compact('products'));
    }
}
